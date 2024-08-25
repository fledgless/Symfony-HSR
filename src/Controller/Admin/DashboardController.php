<?php

namespace App\Controller\Admin;

use App\Entity\BaseCharacter;
use App\Entity\CharacterEidolons;
use App\Entity\CharacterKit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/fledgless', name: 'fledgless')]
    public function index(): Response
    {
        return $this->render('admin/dashboard/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Star Rail');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        
        yield MenuItem::section('Characters');
        yield MenuItem::subMenu('Characters', 'fas fa-folder')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-list', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Kits', 'fas fa-list', CharacterKit::class),
            MenuItem::linkToCrud('New character', 'fas fa-plus', CharacterKit::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Eidolons', 'fas fa-list', CharacterEidolons::class),
            MenuItem::linkToCrud('New character', 'fas fa-plus', CharacterEidolons::class)->setAction(Crud::PAGE_NEW),
        ]);
    }
}
