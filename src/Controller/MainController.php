<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_page')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/careers', name: 'careers_page')]
    public function cooperation(): Response
    {
        return $this->render('main/pages/careers.html.twig');
    }

    #[Route('/contact-us', name: 'contactus_page')]
    public function contactUs(): Response
    {
        return $this->render('main/pages/contact-us.html.twig');
    }

}