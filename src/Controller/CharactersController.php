<?php

namespace App\Controller;

use App\Repository\BaseCharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CharactersController extends AbstractController
{
    #[Route('/characters', name: 'app_characters')]
    public function index(BaseCharacterRepository $characterRepo): Response
    {
        return $this->render('characters/index.html.twig', [
            'characters' => $characterRepo->findAll(),
        ]);
    }
}
