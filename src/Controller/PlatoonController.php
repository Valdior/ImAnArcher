<?php

namespace App\Controller;

use App\Entity\Platoon;
use App\Entity\Tournament;
use App\Form\PlatoonType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tournament/{tournament}/platoon')]
class PlatoonController extends AbstractController
{
    #[Route('/new', name: 'platoon_new')]
    public function new(Tournament $tournament, Request $request, EntityManagerInterface $entityRepository): Response
    {
        $platoon = new Platoon();
        $form = $this->createForm(PlatoonType::class, $platoon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $platoon->setTournament($tournament);
            $entityRepository->persist($platoon);
            $entityRepository->flush();

            return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
        }

        return $this->render('platoon/new.html.twig', [
            'platoon' => $platoon,
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'platoon_show', methods: 'GET')]
    public function show(Platoon $platoon): Response
    {
        return $this->render('platoon/show.html.twig', ['platoon' => $platoon]);
    }

    #[Route('/{id}/edit', name: 'platoon_edit', methods: 'GET|POST')]
    public function edit(
        Request $request,
        Tournament $tournament,
        Platoon $platoon,
        EntityManagerInterface $entityRepository
    ): Response {
        $form = $this->createForm(PlatoonType::class, $platoon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityRepository->flush();

            return $this->redirectToRoute('platoon_show', [
                'tournament' => $tournament->getId(),
                'id' => $platoon->getId()
            ]);
        }

        return $this->render('platoon/edit.html.twig', [
            'platoon' => $platoon,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'platoon_delete', methods: 'POST|DELETE')]
    public function delete(
        Request $request,
        Tournament $tournament,
        Platoon $platoon,
        EntityManagerInterface $entityRepository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $platoon->getId(), $request->request->get('_token'))) {
            $entityRepository->remove($platoon);
            $entityRepository->flush();
        }

        return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
    }
}
