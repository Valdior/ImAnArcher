<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Entity\Participant;
use App\Entity\Platoon;
use App\Form\ParticipantType;
use App\Service\ParticipationHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

#[Route('/tournament/{tournament}/participant')]
class ParticipantController extends AbstractController
{
    #[Route('/{id}/register', name: 'participant_register', methods: 'GET|POST')]
    public function register(
        Tournament $tournament,
        Platoon $platoon,
        Request $request,
        EntityManagerInterface $entityRepository,
        ParticipationHelper $helper
    ): Response {
        if ($helper->isAlreadyRegistered($this->getUser(), $platoon)) {
            $this->addFlash('warning', 'Vous êtes déjà inscrit à ce peloton');
            return $this->redirectToRoute('app_tournament_show', ['id' => $platoon->getTournament()->getId()]);
        }

        $participant = new Participant();
        $participant->setPlatoon($platoon);
        // Pourquoi j'ai été obligé de l'ajouter de cette manière alors qu'il est dans le formulaire ?
        $participant->setArcher($this->getUser());
        $form = $this->createForm(ParticipantType::class, $participant, array('user' => $this->getUser()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityRepository->persist($participant);
            $entityRepository->flush();

            $this->addFlash('success', 'Vous avez bien été inscrit au peloton');

            return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
        }

        return $this->render('participant/register.html.twig', [
            'participant' => $participant,
            'platoon' => $platoon,
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/unregister', name: 'participant_unregister', methods: 'GET|POST')]
    public function unregister(
        Tournament $tournament,
        Platoon $platoon,
        ParticipationHelper $helper
    ): Response {
        if (!$helper->isAlreadyRegistered($this->getUser(), $platoon)) {
            $this->addFlash(
                'warning',
                'Vous ne pouvez pas vous désincrire à un peloton auquel vous n\'êtes pas déjà inscrit'
            );
            return $this->redirectToRoute('tournament_show', ['id' => $tournament->getId()]);
        }

        $helper->cancelParticipation($this->getUser(), $platoon);
        $this->addFlash('success', 'Vous avez bien été désinscrit du peloton');

        return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
    }

    #[Route('/{id}/edit', name: 'participant_edit')]
    public function edit(
        Request $request,
        Tournament $tournament,
        Participant $participant,
        EntityManagerInterface $er
    ): Response {
        $form = $this->createForm(ParticipantType::class, $participant, array('user' => $this->getUser()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump('Before persisting the participant entity: ', $participant);

            $er->persist($participant);
            $er->flush();

            return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
        }

        return $this->render('participant/edit.html.twig', [
            'participant' => $participant,
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }
}
