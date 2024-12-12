<?php

namespace App\Controller\Admin;

use App\Entity\AscensionMats;
use App\Entity\BaseCharacter;
use App\Entity\BossMat;
use App\Entity\CharacterEidolons;
use App\Entity\CharacterKit;
use App\Entity\CharacterStories;
use App\Entity\CharacterVoiceline;
use App\Entity\CrimsonCalyx;
use App\Entity\EchoOfWar;
use App\Entity\EchosBoss;
use App\Entity\EliteEnemy;
use App\Entity\GoldenCalyx;
use App\Entity\LightCone;
use App\Entity\Location;
use App\Entity\Media;
use App\Entity\NormalEnemy;
use App\Entity\Path;
use App\Entity\StagnantShadow;
use App\Entity\TraceMats;
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
                MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class)->setDefaultSort(['characterName' => 'ASC']),
                MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Eidolons','fas fa-star-of-life')->setSubItems([
                MenuItem::linkToCrud('Eidolons', 'fas fa-person-burst', CharacterEidolons::class),
                MenuItem::linkToCrud('Add eidolons', 'fas fa-cart-plus', CharacterEidolons::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Character stories','fas fa-book')->setSubItems([
                MenuItem::linkToCrud('Character stories list', 'fas fa-book-open-reader', CharacterStories::class),
                MenuItem::linkToCrud('New character stories', 'fas fa-user-pen', CharacterStories::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Character voicelines','fas fa-microphone-lines')->setSubItems([
                MenuItem::linkToCrud('Voicelines', 'fas fa-comments', CharacterVoiceline::class),
                MenuItem::linkToCrud('New voiceline', 'fas fa-circle-play', CharacterVoiceline::class)->setAction(Crud::PAGE_NEW),
            ]);
        
        yield MenuItem::section('Light cones');
            yield MenuItem::subMenu('Light cones','fas fa-sheet-plastic')->setSubItems([
                MenuItem::linkToCrud('Light cone list', 'fas fa-folder-open', LightCone::class),
                MenuItem::linkToCrud('New light cone', 'fas fa-file-circle-plus', LightCone::class)->setAction(Crud::PAGE_NEW),
            ]);

        yield MenuItem::section('Associations');
            yield MenuItem::subMenu('Paths', 'fas fa-road')->setSubItems([
                MenuItem::linkToCrud('Path list', 'fas fa-lines-leaning', Path::class),
                MenuItem::linkToCrud('New path', 'fas fa-road-circle-check', Path::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Types', 'fas fa-wand-sparkles')->setSubItems([
                MenuItem::linkToCrud('Media list', 'fas fa-hat-wizard', Type::class),
                MenuItem::linkToCrud('New media', 'fas fa-fire-flame-curved', Type::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Locations', 'fas fa-globe')->setSubItems([
                MenuItem::linkToCrud('Location list', 'fas fa-map', Location::class),
                MenuItem::linkToCrud('New location', 'fas fa-map-pin', Location::class)->setAction(Crud::PAGE_NEW),
            ]);
    
            yield MenuItem::subMenu('Icons', 'fas fa-icons')->setSubItems([
                MenuItem::linkToCrud('Icon list', 'fas fa-image', Media::class),
                MenuItem::linkToCrud('New icon', 'fas fa-camera-retro', Media::class)->setAction(Crud::PAGE_NEW),
            ]);
        
        // fill with the actual mats once done and crud created
        yield MenuItem::section('Materials');
            yield MenuItem::subMenu('Ascension materials','fas fa-screwdriver-wrench')->setSubItems([
                MenuItem::linkToCrud('Ascension mats list', 'fas fa-toolbox', AscensionMats::class),
                MenuItem::linkToCrud('New ascension mats', 'fas fa-wrench', AscensionMats::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Boss materials','fas fa-screwdriver-wrench')->setSubItems([
                MenuItem::linkToCrud('Boss materials list', 'fas fa-toolbox', BossMat::class),
                MenuItem::linkToCrud('New boss mat', 'fas fa-wrench', BossMat::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Trace materials','fas fa-screwdriver-wrench')->setSubItems([
                MenuItem::linkToCrud('Trace materials list', 'fas fa-toolbox', TraceMats::class),
                MenuItem::linkToCrud('New trace mats', 'fas fa-wrench', TraceMats::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Weekly boss materials','fas fa-screwdriver-wrench')->setSubItems([
                MenuItem::linkToCrud('Character list', 'fas fa-toolbox', BaseCharacter::class),
                MenuItem::linkToCrud('New character', 'fas fa-wrench', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
            ]);

        yield MenuItem::section('Enemies');
        yield MenuItem::subMenu('Normal enemies','fas fa-gun')->setSubItems([
            MenuItem::linkToCrud('Normal enemies list', 'fas fa-people-group', NormalEnemy::class),
            MenuItem::linkToCrud('New normal enemy', 'fas fa-person-circle-plus', NormalEnemy::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Elite enemies','fas fa-skull')->setSubItems([
            MenuItem::linkToCrud('Elite enemies list', 'fas fa-people-group', EliteEnemy::class),
            MenuItem::linkToCrud('New elite enemy', 'fas fa-person-circle-plus', EliteEnemy::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Boss enemies','fas fa-skull-crossbones')->setSubItems([
            MenuItem::linkToCrud('Boss enemies list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New boss enemy', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Echo of War boss','fas fa-ghost')->setSubItems([
            MenuItem::linkToCrud('Echo of War boss list', 'fas fa-people-group', EchosBoss::class),
            MenuItem::linkToCrud('New Echo of War boss', 'fas fa-person-circle-plus', EchosBoss::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::section('Domains');
        yield MenuItem::subMenu('Stagnant Shadow','fas fa-dungeon')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', StagnantShadow::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', StagnantShadow::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Echo of War','fas fa-dungeon')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', EchoOfWar::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', EchoOfWar::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Crimson Calyx','fas fa-dungeon')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', CrimsonCalyx::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', CrimsonCalyx::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Golden Calyx','fas fa-dungeon')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', GoldenCalyx::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', GoldenCalyx::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Cavern of Corrosion','fas fa-dungeon')->setSubItems([
            MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
            MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        ]);
    }
}
