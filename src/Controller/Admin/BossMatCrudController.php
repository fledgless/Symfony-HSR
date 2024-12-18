<?php

namespace App\Controller\Admin;

use App\Entity\BossMat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BossMatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BossMat::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addColumn()
            ->hideOnDetail();
            yield TextField::new('bossMatName', 'Boss mat name');
            yield AssociationField::new('bossMatIcon', 'Choose icon for the boss mats:');

        yield FormField::addColumn()
            ->hideOnDetail();
            yield BooleanField::new('bossMatAnnounced', 'Were the mats announced?');
            yield BooleanField::new('bossMatReleased', 'Were the mats released?');
            yield AssociationField::new('weeklyMatEchoOfWar', '(Optional) Stagnant Shadow that drops the mats:');
    }
}
