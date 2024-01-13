<?php

namespace App\Controller\Main;

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

    #[Route('/about-us', name: 'aboutus_page')]
    public function aboutUs(): Response
    {
        return $this->render('main/pages/about-us.html.twig');
    }

}