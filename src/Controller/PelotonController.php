<?php

namespace App\Controller;

use App\Entity\Peloton;
use App\Entity\Tournament;
use App\Form\PelotonType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('//tournament/{tournament}/peloton')]
class PelotonController extends AbstractController
{
    #[Route('/new', name: 'peloton_new')]
    public function new(Tournament $tournament, Request $request, EntityManagerInterface $entityRepository): Response
    {
        $peloton = new Peloton();
        $form = $this->createForm(PelotonType::class, $peloton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $peloton->setTournament($tournament);
            $entityRepository->persist($peloton);
            $entityRepository->flush();

            return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
        }

        return $this->render('peloton/new.html.twig', [
            'peloton' => $peloton,
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'peloton_show', methods: 'GET')]
    public function show(Peloton $peloton): Response
    {
        return $this->render('peloton/show.html.twig', ['peloton' => $peloton]);
    }

    #[Route('/{id}/edit', name: 'peloton_edit', methods: 'GET|POST')]
    public function edit(
        Request $request,
        Tournament $tournament,
        Peloton $peloton,
        EntityManagerInterface $entityRepository
    ): Response {
        $form = $this->createForm(PelotonType::class, $peloton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityRepository->flush();

            return $this->redirectToRoute('peloton_show', [
                'tournament' => $tournament->getId(),
                'id' => $peloton->getId()
            ]);
        }

        return $this->render('peloton/edit.html.twig', [
            'peloton' => $peloton,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'peloton_delete', methods: 'POST|DELETE')]
    public function delete(
        Request $request,
        Tournament $tournament,
        Peloton $peloton,
        EntityManagerInterface $entityRepository
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $peloton->getId(), $request->request->get('_token'))) {
            $entityRepository->remove($peloton);
            $entityRepository->flush();
        }

        return $this->redirectToRoute('app_tournament_show', ['id' => $tournament->getId()]);
    }

    // #[Route('/{id}/register', name: 'peloton_register', methods: 'DELETE')]
    // public function register(Tournament $tournament, Peloton $peloton, Request $request): Response
    // {
    //     $participant = new Participant();
    //     $form = $this->createForm(ParticipantType::class, $participant, array('user' => $this->getUser()));
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $participant->setPeloton($peloton);

    //         if(!in_array('ROLE_ADMIN', $this->getUser()->getRoles()))
    //             $participant->setArcher($this->getUser()->getArcher());

    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($participant);
    //         $em->flush();

    //         return $this->redirectToRoute('tournament_show', ['id' => $tournament->getId()]);
    //     }

    //     return $this->render('participant/register.html.twig', [
    //         'participant' => $participant,
    //         'peloton' => $peloton,
    //         'tournament' => $tournament,
    //         'form' => $form->createView(),
    //     ]);
    // }
}
