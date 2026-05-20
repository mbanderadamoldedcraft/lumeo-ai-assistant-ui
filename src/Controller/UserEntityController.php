<?php

namespace App\Controller;

use App\Entity\UserEntity;
use App\Form\UserEntityType;
use App\Repository\UserEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user')]
class UserEntityController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserEntityRepository $userEntityRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userEntityRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new UserEntity();
        $form = $this->createForm(UserEntityType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('password')->getData();
            if (!empty($plainPassword)) {
                $user->setPassword($plainPassword);
            }

            $user->setCreatedAt(new \DateTime());
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'User successfully created.');

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/create.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(UserEntity $user): Response
    {
        return $this->render('user/read.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UserEntity $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserEntityType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('password')->getData();
            if (!empty($plainPassword)) {
                $user->setPassword($plainPassword);
            }

            $user->setUpdatedAt(new \DateTime());
            $entityManager->flush();

            $this->addFlash('success', 'User successfully updated.');

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/update.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, UserEntity $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
            $this->addFlash('success', 'User successfully deleted.');
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
