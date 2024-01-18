<?php

namespace App\Controller\Dashboard;

use App\Entity\Admin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: 'login', name: 'dashboard_login')]
    public function login(AuthenticationUtils $authenticationUtils, UserPasswordHasherInterface $userPasswordHasherInterface, EntityManagerInterface $entityManager): Response
    {
        // $user = new Admin;
        // $plaintextPassword = '123456789';
        // $user->setUsername('user2');
        // $user->setPassword($userPasswordHasherInterface->hashPassword(
        //     $user,
        //     $plaintextPassword
        // ));
        // $user->setFullname('علی اکبر مطلبی');
        // $user->setRoles(['ROLE_ADMIN']);

        // $entityManager->persist($user);
        // $entityManager->flush();

        if ($this->getUser()) {
            return $this->redirectToRoute('dashboard_admin');
        }

        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('dashboard/security/dashboard_login.html.twig', [
            'error' => $error
        ]);
    }

    #[Route(path: 'dashboard/logout', name: 'dashboard_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}