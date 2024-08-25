<?php

namespace App\Controller;

use App\Entity\BaseCharacter;
use App\Repository\BaseCharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CharacterController extends AbstractController
{
    #[Route('/characters/{characterName}', name: 'character_show', methods: ['GET'])]
    public function show(string $characterName, BaseCharacterRepository $characterRepo): Response
    {
        $character = $characterRepo->findOneBy(['characterName' => $characterName]);
        if (!$character) {
            return $this->redirectToRoute('app_characters');
        } else {
            return $this->render('character/show.html.twig', [
                'character' => $character
            ]);
        }
    }
}
