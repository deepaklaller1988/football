<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\Team;
use App\Form\TransferType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransferController extends AbstractController
{
    /**
     * @Route("/player/transfer", name="player_transfer", methods={"GET", "POST"})
     */
    public function transfer(Request $request): Response
    {
        $form = $this->createForm(TransferType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $player = $data['player'];
            $sourceTeam = $data['sourceTeam'];
            $targetTeam = $data['targetTeam'];
            $amount = $data['amount'];

            if ($sourceTeam->getMoneyBalance() >= $amount) {
                $entityManager = $this->getDoctrine()->getManager();

                // Deduct the amount from the source team
                $sourceTeam->setMoneyBalance($sourceTeam->getMoneyBalance() - $amount);
                $entityManager->persist($sourceTeam);

                // Add the amount to the target team
                $targetTeam->setMoneyBalance($targetTeam->getMoneyBalance() + $amount);
                $entityManager->persist($targetTeam);

                // Assign the player to the target team
                $player->setTeam($targetTeam);
                $entityManager->persist($player);

                $entityManager->flush();

                $this->addFlash('success', 'Player transferred successfully.');

                return $this->redirectToRoute('player_index');
            } else {
                $this->addFlash('error', 'Insufficient funds in the source team.');
            }
        }

        return $this->render('transfer/transfer.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

