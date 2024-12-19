<?php

namespace App\Controller;

use App\Repository\AscensionMatsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MaterialsController extends AbstractController
{
    #[Route('/materials', name: 'app_materials')]
    public function index(AscensionMatsRepository $ascMatRepo): Response
    {
        return $this->render('materials/index.html.twig', [
            'ascmats' => $ascMatRepo->findAll(),
        ]);
    }
}
