<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CharacterListController extends AbstractController
{
    #[Route('/character/list', name: 'app_character_list')]
    public function index(): Response
    {
        return $this->render('character_list/index.html.twig', [
            'controller_name' => 'CharacterListController',
        ]);
    }
}
