<?php

namespace App\Controller\Admin;

use App\Entity\BaseCharacter;
use App\Entity\CharacterEidolons;
use App\Entity\CharacterKit;
use App\Entity\LightCone;
use App\Entity\Location;
use App\Entity\Media;
use App\Entity\Path;
use App\Entity\Type;
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
        yield MenuItem::subMenu('Characters','fas fa-person')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Eidolons','fas fa-star-of-life')->setSubItems([
            MenuItem::linkToCrud('Eidolons', 'fas fa-person-burst', CharacterEidolons::class),
            MenuItem::linkToCrud('Add eidolons', 'fas fa-cart-plus', CharacterEidolons::class)->setAction(Crud::PAGE_NEW),
        ]);
        
        yield MenuItem::section('Light cones');
        yield MenuItem::subMenu('Light cones','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Light cone list', 'fas fa-list', LightCone::class),
            MenuItem::linkToCrud('New light cone', 'fas fa-plus', LightCone::class)->setAction(Crud::PAGE_NEW),
        ]);
        
        // fill with the actual mats once done and crud created
        yield MenuItem::section('Materials');
        yield MenuItem::subMenu('Ascension materials','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Boss materials','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Trace materials','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Weekly boss materials','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::section('Enemies');
        yield MenuItem::subMenu('Normal enemies','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Elite enemies','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Boss enemies','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Echo of War enemies','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::section('Domains');
        yield MenuItem::subMenu('Stagnant Shadow','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Echo of War','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Crimson Calyx','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Golden Calyx','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Cavern of Corrosion','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);


        yield MenuItem::section('Associations');
        yield MenuItem::subMenu('Paths', 'fas fa-image')->setSubItems([
            MenuItem::linkToCrud('Path list', 'fas fa-list', Path::class),
            MenuItem::linkToCrud('New path', 'fas fa-plus', Path::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Types', 'fas fa-image')->setSubItems([
            MenuItem::linkToCrud('Media list', 'fas fa-list', Type::class),
            MenuItem::linkToCrud('New media', 'fas fa-plus', Type::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Locations', 'fas fa-image')->setSubItems([
            MenuItem::linkToCrud('Location list', 'fas fa-list', Location::class),
            MenuItem::linkToCrud('New location', 'fas fa-plus', Location::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Icons', 'fas fa-image')->setSubItems([
            MenuItem::linkToCrud('Icon list', 'fas fa-list', Media::class),
            MenuItem::linkToCrud('New icon', 'fas fa-plus', Media::class)->setAction(Crud::PAGE_NEW),
        ]);
    }
}
