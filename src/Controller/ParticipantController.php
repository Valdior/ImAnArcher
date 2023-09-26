<?php

namespace App\Controller;

use App\Entity\Platoon;
use App\Entity\Tournament;
use App\Entity\Participant;
use App\Form\ParticipantType;
use App\Service\ParticipationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Security\Voter\PlatoonParticipantVoter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

#[Route('/tournament/{tournament}/participant')]
class ParticipantController extends AbstractController
{
    #[Route('/{id}/register', name: 'participant_register', methods: 'GET|POST')]
    #[IsGranted('ROLE_USER')]
    public function register(
        Tournament $tournament,
        Platoon $platoon,
        Request $request,
        EntityManagerInterface $entityRepository,
        AuthorizationCheckerInterface $auth
    ): Response {
        if (!$auth->isGranted(PlatoonParticipantVoter::REGISTER, $platoon)) {
            return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
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
    #[IsGranted('ROLE_USER')]
    public function unregister(
        Tournament $tournament,
        Platoon $platoon,
        ParticipationService $ps,
        AuthorizationCheckerInterface $auth
    ): Response {
        if (!$auth->isGranted(PlatoonParticipantVoter::UNREGISTER, $platoon)) {
            return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
        }

        $ps->cancelParticipation($this->getUser(), $platoon);
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
