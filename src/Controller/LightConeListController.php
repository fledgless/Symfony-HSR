<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LightConeListController extends AbstractController
{
    #[Route('/light/cone/list', name: 'app_light_cone_list')]
    public function index(): Response
    {
        return $this->render('light_cone_list/index.html.twig', [
            'controller_name' => 'LightConeListController',
        ]);
    }
}
