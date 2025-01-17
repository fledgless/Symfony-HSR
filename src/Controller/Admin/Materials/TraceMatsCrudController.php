<?php

namespace App\Controller\Admin\Materials;

use App\Entity\Materials\TraceMats;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TraceMatsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TraceMats::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addColumn()
            ->hideOnDetail();
            yield TextField::new('fourStarName', '4-star mat');
            yield TextField::new('threeStarName', '3-star mat');
            yield TextField::new('twoStarName', '2-star mat');
            yield SlugField::new('slug')
                ->setTargetFieldName('fourStarName')
                ->hideOnIndex();
            yield AssociationField::new('path');
            yield AssociationField::new('icons')
                ->hideOnIndex();

        yield FormField::addColumn()
            ->hideOnDetail();
            yield BooleanField::new('announced', 'Announced?');
            yield BooleanField::new('released', 'Released?');
            yield AssociationField::new('crimsonCalyx', '(Optional) Crimson Calyx that drops the mats:')
                ->hideOnIndex();
    }
}
