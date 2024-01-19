<?php

namespace App\Controller\Dashboard;

use App\Repository\ResumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResumeController extends AbstractController
{
    #[Route('/dashboard/resumes', name: 'dashboard_resumes')]
    public function index(ResumeRepository $resumeRepository): Response
    {
        $resumes = $resumeRepository->findAll();
        return $this->render('dashboard/pages/resume/index.html.twig', [
            'resumes' => $resumes
        ]);
    }
}