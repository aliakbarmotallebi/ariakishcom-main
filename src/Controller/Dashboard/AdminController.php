<?php

namespace App\Controller\Dashboard;

use App\Repository\AdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/dashboard/admins', name: 'dashboard_admins')]
    public function index(AdminRepository $adminRepository): Response
    {
        $admins = $adminRepository->findAll();
        return $this->render('dashboard/admin/index.html.twig', [
            'admins' => $admins,
        ]);
    }
}