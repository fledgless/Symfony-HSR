<?php

namespace App\Controller\Admin;

use App\Entity\Materials\WeeklyMat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WeeklyMatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WeeklyMat::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addColumn()
            ->hideOnDetail();
            yield TextField::new('weeklyMatName', 'Weekly boss mat name');
            yield SlugField::new('slug')
                ->setTargetFieldName('weeklyMatName')
                ->hideOnIndex();
            yield AssociationField::new('weeklyMatIcon', 'Choose icon for weekly boss mats:');

        yield FormField::addColumn()
            ->hideOnDetail();
            yield BooleanField::new('weeklyMatAnnounced', 'Were the mats announced?')
                ->hideOnIndex();
            yield BooleanField::new('weeklyMatReleased', 'Were the mats released?')
                ->hideOnIndex();
            yield AssociationField::new('weeklyMatEchoOfWar', '(Optional) Echo of War that drops the mats:')
                ->hideOnIndex();
    }
}
