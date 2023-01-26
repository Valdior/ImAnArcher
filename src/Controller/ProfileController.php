<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile', methods: ['GET'])]
    public function show()
    {
        // usually you'll want to make sure the user is authenticated first,
        // see "Authorization" below
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        return $this->render('profile/show.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/profile/{username}", name="profile_edit")
     */
    #[Route('/profile/{username}', name: 'app_profile_edit', methods: ['GET'])]
    public function edit(
        Request $request,
        User $user,
        EntityManagerInterface $entityManager,
        TranslatorInterface $translator
    ) {
        /** @var User $userConnected */
        $userConnected = $this->getUser();

        if (
            !is_object($user)
            || !$userConnected instanceof UserInterface
            || $user->getId() !== $userConnected->getId()
        ) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', $translator->trans('profil.flash.updated', [], 'user'));
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
