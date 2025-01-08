<?php

namespace App\Controller;

use App\Repository\Characters\BaseCharacterRepository;
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

    #[Route('/characters/{characterSlug}', name: 'character_show', methods: ['GET'])]
    public function show(string $characterSlug, BaseCharacterRepository $characterRepo): Response
    {
        $character = $characterRepo->findOneBy(['characterSlug' => $characterSlug]);
        if (!$character) {
            return $this->redirectToRoute('app_characters');
        } else {
            return $this->render('characters/character/show.html.twig', [
                'character' => $character
            ]);
        }
    }

    // public function searchType(string $characterPath, BaseCharacterRepository $characterRepo): Response
    // {
    //     $characters = $characterRepo->findBy(['characterPath' => $characterPath]);
    //         return $this->render('characters/index.html.twig', [
    //             'characters' => $characters
    //         ]);
    // }
}
