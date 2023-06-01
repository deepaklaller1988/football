<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Player;
use App\Form\PlayerType;

class PlayerController extends AbstractController
{
    // Action to list all players with pagination
    public function index(Request $request): Response
    {
        $page = $request->query->getInt('page', 1);
        $players = $this->getDoctrine()->getRepository(Player::class)->findAllPaginated($page);

        return $this->render('player/list.html.twig', [
            'players' => $players,
        ]);
    }

    // Action to add a new player
    public function add(Request $request): Response
    {
        $player = new Player();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($player);
            $entityManager->flush();

            $this->addFlash('success', 'Player created successfully.');

            return $this->redirectToRoute('player_index');
        }

        return $this->render('player/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
