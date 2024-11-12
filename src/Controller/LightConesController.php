<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LightConesController extends AbstractController
{
    #[Route('/light-cones', name: 'app_light_cones')]
    public function index(): Response
    {
        return $this->render('light_cones/index.html.twig', [
            'controller_name' => 'LightConesController',
        ]);
    }
}
