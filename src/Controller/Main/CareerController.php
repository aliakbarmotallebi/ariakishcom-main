<?php

namespace App\Controller\Main;

use App\Entity\Resume;
use App\Form\ResumeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CareerController extends AbstractController
{
    #[Route('/career', name: 'career_page')]
    public function cooperation(): Response
    {
        $contact = new Resume();
        $form = $this->createForm(ResumeFormType::class, $contact);

        return $this->render('main/pages/career.html.twig', [
            'form' => $form
        ]);
    }
}