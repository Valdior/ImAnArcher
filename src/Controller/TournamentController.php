<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Form\TournamentType;
use App\Repository\TournamentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tournament')]
class TournamentController extends AbstractController
{
    public function __construct(
        private Security $security,
    ) {
    }

    #[Route('/', name: 'app_tournament', methods: 'GET')]
    public function index(TournamentRepository $tournamentRepository): Response
    {
        $result = $tournamentRepository->findBy(array(), array('startDate' => 'DESC'));

        return $this->render('tournament/index.html.twig', [
            'current_menu'  => 'tournament',
            'tournaments' => $result
        ]);
    }

    #[Route('/calendar', name: 'app_tournament_calendar', methods: 'GET')]
    public function calendar(TournamentRepository $tournamentRepository): Response
    {
        $result = $tournamentRepository->findBy(array(), array('startDate' => 'DESC'));

        return $this->render('tournament/calendar.html.twig', [
            'current_menu'  => 'calendar',
            'tournaments' => $result
        ]);
    }

    #[Route('/new', name: 'app_tournament_new', methods: 'GET|POST')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tournament = new Tournament();
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tournament);
            $entityManager->flush();

            return $this->redirectToRoute('app_tournament');
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
            //dump($tournament);
        }
        else
        {
            $tournament = $er->findById($id);
        }

        return $this->render('tournament/show.html.twig', [
            'current_menu' => 'tournament',
            'tournament' => $tournament
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tournament_edit', methods: 'GET|POST')]
    public function edit(Request $request, Tournament $tournament, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tournament);
            $entityManager->flush();

            return $this->redirectToRoute('app_tournament_edit', ['id' => $tournament->getId()]);
        }

        return $this->render('tournament/edit.html.twig', [
            'current_menu' => 'tournament',
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_tournament_delete', methods: 'POST|DELETE')]
    public function delete(
        Request $request,
        Tournament $tournament,
        EntityManagerInterface $entityManager
    ): RedirectResponse {
        if ($this->isCsrfTokenValid('delete' . $tournament->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tournament);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tournament');
    }
}
