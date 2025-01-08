<?php

namespace App\Controller;

use App\Repository\AscensionMatsRepository;
use App\Repository\BossMatRepository;
use App\Repository\TraceMatsRepository;
use App\Repository\WeeklyMatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MaterialsController extends AbstractController
{
    #[Route('/materials', name: 'app_materials')]
    public function index(AscensionMatsRepository $ascMatRepo, BossMatRepository $bossMatRepo, TraceMatsRepository $traceMatsRepo, WeeklyMatRepository $weeklyMatRepo): Response
    {
        return $this->render('materials/index.html.twig', [
            'ascmats' => $ascMatRepo->findAll(),
            'bossmats' => $bossMatRepo->findAll(),
            'tracemats' => $traceMatsRepo->findAll(),
            'echomats' => $weeklyMatRepo->findAll()
        ]);
    }
}
