<?php

namespace App\Controller;

use App\Entity\LightCone;
use App\Repository\LightConeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LightConeController extends AbstractController
{
    #[Route('/light-cones/{lcName}', name: 'lc_show', methods: ['GET'])]
    public function show(string $lcName, LightConeRepository $lcRepo): Response
    {
        $lightcone = $lcRepo->findOneBy(['lcName' => $lcName]);
        if (!$lightcone) {
            return $this->redirectToRoute('app_light_cones');
        } else {
            return $this->render('light_cone/show.html.twig', [
                'lightcone' => $lightcone
            ]);
        }
    }
}
