<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResumeController extends AbstractController
{
    #[Route('/dashboard/resumes', name: 'dashboard_resumes')]
    public function index(): Response
    {
        return $this->render('dashboard/resume/index.html.twig', [
            'controller_name' => 'ResumeController',
        ]);
    }
}