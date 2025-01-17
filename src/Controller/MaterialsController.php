<?php

namespace App\Controller;

use App\Repository\Materials\AscensionMatsRepository;
use App\Repository\Materials\BossMatRepository;
use App\Repository\Materials\TraceMatsRepository;
use App\Repository\Materials\WeeklyMatRepository;
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
