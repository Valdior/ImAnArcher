<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Form\TournamentType;
use App\Repository\TournamentRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ParticipantRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/tournament')]
class TournamentController extends AbstractController
{
    public function __construct(
        private Security $security,
    ) {
    }

    #[Route('/', name: 'app_tournament_next', methods: 'GET')]
    public function next(TournamentRepository $tournamentRepository, int $max = 5, bool $showInfo = false): Response
    {
        $tournaments = $tournamentRepository->nextTournaments($max);
        return $this->render('tournament/_agenda.html.twig', [
            'tournaments' => $tournaments,
            'showInfo' => $showInfo
        ]);
    }

    #[Route('/', name: 'app_tournament_last', methods: 'GET')]
    public function last(TournamentRepository $tournamentRepository, int $max = 5, bool $showInfo = false): Response
    {
        $tournaments = $tournamentRepository->lastTournaments($max);
        return $this->render('tournament/_agenda.html.twig', [
            'tournaments' => $tournaments,
            'showInfo' => $showInfo
        ]);
    }

    #[Route('/calendar', name: 'app_tournament_calendar', methods: 'GET')]
    public function calendar(TournamentRepository $tournamentRepository): Response
    {
        $result = $tournamentRepository->findTournamentsAfterToday();

        return $this->render('tournament/calendar.html.twig', [
            'current_menu'  => 'calendar',
            'tournaments' => $result
        ]);
    }

    #[Route('/new', name: 'app_tournament_new', methods: 'GET|POST')]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tournament = new Tournament();
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tournament);
            $entityManager->flush();

            return $this->redirectToRoute('app_tournament_calendar');
        }

        return $this->render('tournament/new.html.twig', [
            'current_menu' => 'tournament',
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_tournament_show', methods: 'GET')]
    public function show(int $id, TournamentRepository $er): Response
    {
        if ($this->security->isGranted('IS_AUTHENTICATED')) {
            $tournament = $er->findAllDatas($id, $this->getUser());
        } else {
            $tournament = $er->findOneById($id);
        }

        return $this->render('tournament/show.html.twig', [
            'current_menu' => 'tournament',
            'tournament' => $tournament
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tournament_edit', methods: 'GET|POST')]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Tournament $tournament, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tournament);
            $entityManager->flush();

            return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
        }

        return $this->render('tournament/edit.html.twig', [
            'current_menu' => 'tournament',
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_tournament_delete', methods: 'POST|DELETE')]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(
        Request $request,
        Tournament $tournament,
        EntityManagerInterface $entityManager
    ): RedirectResponse {
        if ($this->isCsrfTokenValid('delete' . $tournament->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tournament);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tournament_calendar');
    }

    #[Route('/{id}/ranking', name: 'app_tournament_ranking', methods: 'GET')]
    public function ranking(Tournament $tournament, ParticipantRepository $repo)
    {
        $participants = $repo->ranking($tournament->getId());
        return $this->render('tournament/_ranking.html.twig', ['participants' => $participants]);
    }
}
