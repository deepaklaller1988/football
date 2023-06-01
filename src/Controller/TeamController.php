<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Team;
use App\Form\TeamType;

class TeamController extends AbstractController
{
    public function index(): Response
{
    $teams = $this->getDoctrine()->getRepository(Team::class)->findAll();

    return $this->render('team/list.html.twig', [
        'teams' => $teams,
    ]);
}
    // Action to add a new team and its players
    public function add(Request $request): Response
    {
        $team = new Team();
        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($team);
            $entityManager->flush();

            $this->addFlash('success', 'Team created successfully.');

            return $this->redirectToRoute('team_index');
        }

        return $this->render('team/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
