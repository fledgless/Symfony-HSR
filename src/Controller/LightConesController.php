<?php

namespace App\Controller;

use App\Repository\LightConeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LightConesController extends AbstractController
{
    #[Route('/light-cones', name: 'app_light_cones')]
    public function index(LightConeRepository $lcRepo): Response
    {
        return $this->render('light_cones/index.html.twig', [
            'lightcones' => $lcRepo->findAll(),
        ]);
    }

    #[Route('/light-cones/{lcSlug}', name: 'lc_show', methods: ['GET'])]
    public function show(string $lcSlug, LightConeRepository $lcRepo): Response
    {
        $lightcone = $lcRepo->findOneBy(['lcSlug' => $lcSlug]);
        if (!$lightcone) {
            return $this->redirectToRoute('app_light_cones');
        } else {
            return $this->render('light_cones/light_cone/show.html.twig', [
                'lightcone' => $lightcone
            ]);
        }
    }
}
