<?php

namespace App\Controller\Admin;

use App\Entity\BaseCharacter;
use App\Entity\CharacterEidolons;
use App\Entity\CharacterKit;
use App\Entity\LightCone;
use App\Entity\Media;
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
        yield MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class);
        yield MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Kits', 'fas fa-person-rifle', CharacterKit::class);
        yield MenuItem::linkToCrud('Add kit', 'fas fa-kit-medical', CharacterKit::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Eidolons', 'fas fa-person-burst', CharacterEidolons::class);
        yield MenuItem::linkToCrud('Add eidolons', 'fas fa-cart-plus', CharacterEidolons::class)->setAction(Crud::PAGE_NEW);

        yield MenuItem::section('Light cones');
        yield MenuItem::subMenu('Light cones','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Light cone list', 'fas fa-list', LightCone::class),
            MenuItem::linkToCrud('New light cone', 'fas fa-plus', LightCone::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Medias', 'fas fa-image')->setSubItems([
            MenuItem::linkToCrud('Media list', 'fas fa-list', Media::class),
            MenuItem::linkToCrud('New media', 'fas fa-plus', Media::class)->setAction(Crud::PAGE_NEW),
        ]);
    }
}
