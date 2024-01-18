<?php

namespace App\Controller\Main;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact-us', name: 'contactus_page', methods: ['GET', 'POST'])]
    public function formContactUs(
        Request $request,
        EntityManagerInterface $em
        ): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($contact);
            $em->flush();
            sweetalert()->confirmButtonText(
                'متوجه شدم',
            )->addSuccess('پیام شما باموفقیت ثبت شد'); 
            return $this->redirectToRoute('contactus_page');
        }

        return $this->render('main/pages/contact-us.html.twig', [
            'form' => $form
        ]);
    }
}