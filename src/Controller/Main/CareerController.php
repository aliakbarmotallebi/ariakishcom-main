<?php

namespace App\Controller\Main;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CareerController extends AbstractController
{
    #[Route('/career', name: 'career_page')]
    public function cooperation(): Response
    {
        return $this->render('main/pages/career.html.twig');
    }
}