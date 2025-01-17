<?php

namespace App\Controller\Admin\Materials;

use App\Entity\Materials\BossMat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
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
            yield TextField::new('name');
            yield SlugField::new('slug')
                ->setTargetFieldName('name')
                ->hideOnIndex();
            yield AssociationField::new('type');
            yield AssociationField::new('icon');
    

        yield FormField::addColumn()
            ->hideOnDetail();
            yield BooleanField::new('announced', 'Announced?');
            yield BooleanField::new('released', 'Released?');
            yield AssociationField::new('stagnantShadow', '(Optional) Stagnant Shadow that drops the mats:')
                ->hideOnIndex();
    }
}