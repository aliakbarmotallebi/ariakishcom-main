<?php

namespace App\Controller\Main;

use App\Entity\Resume;
use App\Enum\Language;
use App\Form\ResumeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CareerController extends AbstractController
{
    #[Route('/career', name: 'career_page', methods: ['GET', 'POST'])]
    public function cooperation(
        Request $request,
        EntityManagerInterface $em
    ): Response
    {
        $resume = new Resume();
        $form = $this->createForm(ResumeFormType::class, $resume);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($resume);
            $em->flush();
            sweetalert()->confirmButtonText(
                'متوجه شدم',
            )->addSuccess('رزومه شما باموفقیت ثبت شد'); 
            return $this->redirectToRoute('career_page');
        }
        $form = $this->createForm(ResumeFormType::class, $resume);

        return $this->render('main/pages/career.html.twig', [
            'form' => $form
        ]);
    }
}