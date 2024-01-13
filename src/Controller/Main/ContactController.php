<?php

namespace App\Controller\Main;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact-us', name: 'contactus_page')]
    public function contactUs(): Response
    {
        return $this->render('main/pages/contact-us.html.twig');
    }
}