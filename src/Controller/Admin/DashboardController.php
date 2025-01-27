<?php

namespace App\Controller\Admin;

use App\Entity\Characters\BaseCharacter;
use App\Entity\Characters\CharacterEidolon;
use App\Entity\Characters\CharacterKit;
use App\Entity\Characters\CharacterMinorTraces;
use App\Entity\Characters\CharacterSkill;
use App\Entity\Characters\CharacterStories;
use App\Entity\Characters\CharacterVoiceline;
use App\Entity\Domains\CrimsonCalyx;
use App\Entity\Domains\EchoOfWar;
use App\Entity\Domains\GoldenCalyx;
use App\Entity\Domains\StagnantShadow;
use App\Entity\Enemies\EchosBoss;
use App\Entity\Enemies\EliteEnemy;
use App\Entity\Enemies\NormalEnemy;
use App\Entity\LightCone;
use App\Entity\Location;
use App\Entity\Materials\AscensionMats;
use App\Entity\Materials\BossMat;
use App\Entity\Materials\TraceMats;
use App\Entity\Materials\WeeklyMat;
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
            yield MenuItem::subMenu('Characters','fas fa-id-card')->setSubItems([
                MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class)->setDefaultSort(['releaseVersion' => 'DESC']),
                MenuItem::linkToCrud('New character', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Character stories','fas fa-book')->setSubItems([
                MenuItem::linkToCrud('Character stories list', 'fas fa-book-open-reader', CharacterStories::class),
                MenuItem::linkToCrud('New character stories', 'fas fa-user-pen', CharacterStories::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Character voicelines','fas fa-microphone-lines')->setSubItems([
                MenuItem::linkToCrud('Voicelines', 'fas fa-comments', CharacterVoiceline::class),
                MenuItem::linkToCrud('New voiceline', 'fas fa-circle-play', CharacterVoiceline::class)->setAction(Crud::PAGE_NEW),
            ]);

        yield MenuItem::section('Character kit');
            yield MenuItem::subMenu('Character kit', 'fas fa-person-rays')->setSubItems([
                MenuItem::linkToCrud('Character kit list', 'fas fa-arrows-down-to-people', CharacterKit::class)->setDefaultSort(['name' => 'ASC']),
                MenuItem::linkToCrud('New character kit', 'fas fa-person-circle-plus', CharacterKit::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Skills', 'fas fa-person-dots-from-line')->setSubItems([
                MenuItem::linkToCrud('Skill list', 'fas fa-arrows-down-to-people', CharacterSkill::class)->setDefaultSort(['characterKit' => 'ASC']),
                MenuItem::linkToCrud('New skill', 'fas fa-person-circle-plus', CharacterSkill::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Minor traces', 'fas fa-draw-polygon')->setSubItems([
                MenuItem::linkToCrud('Minor traces list', 'fas fa-arrows-down-to-people', CharacterMinorTraces::class)->setDefaultSort(['characterKit' => 'ASC']),
                MenuItem::linkToCrud('New minor traces', 'fas fa-person-circle-plus', CharacterMinorTraces::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Eidolons', 'fas fa-star')->setSubItems([
                MenuItem::linkToCrud('Eidolon list', 'fas fa-ranking-star', CharacterEidolon::class)->setDefaultSort(['characterKit' => 'ASC']),
                MenuItem::linkToCrud('New eidolon', 'fas fa-cart-plus', CharacterEidolon::class)->setAction(Crud::PAGE_NEW),
            ]);

        yield MenuItem::section('Memosprites');
            yield MenuItem::subMenu('Memosprite','fas fa-cat')->setSubItems([
                MenuItem::linkToCrud('Memosprite list', 'fas fa-dragon', LightCone::class),
                MenuItem::linkToCrud('New memosprite', 'fas fa-feather', LightCone::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Memosprite skill','fas fa-shield-cat')->setSubItems([
                MenuItem::linkToCrud('Memo-skill list', 'fas fa-folder-open', LightCone::class),
                MenuItem::linkToCrud('New memo-skill', 'fas fa-file-circle-plus', LightCone::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Memosprite talent','fas fa-paw')->setSubItems([
                MenuItem::linkToCrud('Memo-talent list', 'fas fa-folder-open', LightCone::class),
                MenuItem::linkToCrud('New memo-talent', 'fas fa-file-circle-plus', LightCone::class)->setAction(Crud::PAGE_NEW),
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
                MenuItem::linkToCrud('Type list', 'fas fa-hat-wizard', Type::class),
                MenuItem::linkToCrud('New type', 'fas fa-fire-flame-curved', Type::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Locations', 'fas fa-landmark')->setSubItems([
                MenuItem::linkToCrud('Location list', 'fas fa-globe', Location::class),
                MenuItem::linkToCrud('New location', 'fas fa-map-pin', Location::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Stats','fas fa-chart-column')->setSubItems([
                MenuItem::linkToCrud('Stat list', 'fas fa-list-check', LightCone::class),
                MenuItem::linkToCrud('New stat', 'fas fa-heart-circle-plus', LightCone::class)->setAction(Crud::PAGE_NEW),
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
                MenuItem::linkToCrud('Weekly boss mat list', 'fas fa-toolbox', WeeklyMat::class),
                MenuItem::linkToCrud('New weekly boss mat', 'fas fa-wrench', WeeklyMat::class)->setAction(Crud::PAGE_NEW),
            ]);

        yield MenuItem::section('Enemies');
        yield MenuItem::subMenu('Normal enemies','fas fa-skull')->setSubItems([
            MenuItem::linkToCrud('Normal enemies list', 'fas fa-list', NormalEnemy::class),
            MenuItem::linkToCrud('New normal enemy', 'fas fa-circle-plus', NormalEnemy::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Elite enemies','fas fa-skull-crossbones')->setSubItems([
            MenuItem::linkToCrud('Elite enemies list', 'fas fa-list', EliteEnemy::class),
            MenuItem::linkToCrud('New elite enemy', 'fas fa-circle-plus', EliteEnemy::class)->setAction(Crud::PAGE_NEW),
        ]);
        // yield MenuItem::subMenu('Boss enemies','fas fa-book-skull')->setSubItems([
        //     MenuItem::linkToCrud('Boss enemies list', 'fas fa-people-group', BaseCharacter::class),
        //     MenuItem::linkToCrud('New boss enemy', 'fas fa-person-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        // ]);
        yield MenuItem::subMenu('Echo of War boss','fas fa-ghost')->setSubItems([
            MenuItem::linkToCrud('Echo of War boss list', 'fas fa-list', EchosBoss::class),
            MenuItem::linkToCrud('New Echo of War boss', 'fas fa-circle-plus', EchosBoss::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::section('Domains');
        yield MenuItem::subMenu('Stagnant Shadow','fas fa-dungeon')->setSubItems([
            MenuItem::linkToCrud('Shadow list', 'fas fa-list', StagnantShadow::class),
            MenuItem::linkToCrud('New shadow', 'fas fa-circle-plus', StagnantShadow::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Echo of War','fas fa-dungeon')->setSubItems([
            MenuItem::linkToCrud('Echo list', 'fas fa-list', EchoOfWar::class),
            MenuItem::linkToCrud('New echo', 'fas fa-circle-plus', EchoOfWar::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Crimson Calyx','fas fa-plant-wilt')->setSubItems([
            MenuItem::linkToCrud('Calyx list', 'fas fa-seedling', CrimsonCalyx::class),
            MenuItem::linkToCrud('New calyx', 'fas fa-circle-plus', CrimsonCalyx::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Golden Calyx','fas fa-plant-wilt')->setSubItems([
            MenuItem::linkToCrud('Calyx list', 'fas fa-seedling', GoldenCalyx::class),
            MenuItem::linkToCrud('New calyx', 'fas fa-circle-plus', GoldenCalyx::class)->setAction(Crud::PAGE_NEW),
        ]);
        // yield MenuItem::subMenu('Cavern of Corrosion','fas fa-dungeon')->setSubItems([
        //     MenuItem::linkToCrud('Character list', 'fas fa-people-group', BaseCharacter::class),
        //     MenuItem::linkToCrud('New character', 'fas fa-circle-plus', BaseCharacter::class)->setAction(Crud::PAGE_NEW),
        // ]);
    }
}
