<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;

class SecurityController extends AbstractController
{
    #[Route('/security/{id}', name: 'security_delete_account', methods: 'POST')]
    public function deleteAccount(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            if (!in_array('ROLE_ADMIN', $user->getRoles())) {
                $user->setCompetitions(null);
                $entityManager->remove($user);
                $entityManager->flush();
            }            
        }

        return $this->redirectToRoute('home');
    }
}
