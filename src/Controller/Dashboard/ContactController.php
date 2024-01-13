<?php

namespace App\Controller\Dashboard;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/dashboard/contacts', name: 'dashboard_contacts')]
    public function index(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();
        return $this->render('dashboard/contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}