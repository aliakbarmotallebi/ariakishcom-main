<?php

namespace App\Controller\Dashboard;

use App\Form\SearchType;
use App\Model\SearchData;
use App\Repository\AdminRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard/admins')]
class AdminController extends AbstractController
{
    #[Route('/index', name: 'dashboard_admins_index', methods: ['GET'])]
    public function index(
        AdminRepository $adminRepository, 
        Request $request, PaginatorInterface $paginator
        ): Response
    {
        $searchData = new SearchData();
        $form = $this->createForm(SearchType::class, $searchData);
        $form->handleRequest($request);

        $contents = $paginator->paginate($adminRepository->findBy([], ['createdAt' => 'ASC'], 5), 1,2);

        if ($form->isSubmitted() && $form->isValid()) {
            $contents = $adminRepository->findBySearch($searchData);
        }
   
        return $this->render('dashboard/pages/admin/index.html.twig', [
            'form' => $form->createView(),
            'contents' => $contents
        ]);
    }

    #[Route('/add', name: 'dashboard_admins_add', methods: ['GET', 'POST'])]
    public function add(Request $request)
    {
        // $tutorial = new Tutorial();
        // $form = $this->createForm(TutorialType::class, $tutorial);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $slug = $slugger->slug($tutorial->getName());
        //     $tutorial->setSlug($slug);
        //     $tutorialRepository->save($tutorial, true);

        //     return $this->redirectToRoute('app_admin_tutorial_index', [], Response::HTTP_SEE_OTHER);
        // }

        // return $this->renderForm('/admin/admin_tutorial/new.html.twig', [
        //     'tutorial' => $tutorial,
        //     'form' => $form,
        // ]);
    }
}