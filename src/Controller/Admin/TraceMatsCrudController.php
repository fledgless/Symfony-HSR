<?php

namespace App\Controller\Admin;

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
            yield TextField::new('traceMatsFourStarName', '4-star trace mat');
            yield TextField::new('traceMatsThreeStarName', '3-star trace mat');
            yield TextField::new('traceMatsTwoStarName', '2-star trace mat');
            yield SlugField::new('slug')
                ->setTargetFieldName('traceMatsFourStarName')
                ->hideOnIndex();
            yield AssociationField::new('traceMatsPath', 'Path for the mats');
            yield AssociationField::new('traceMatsIcons', 'Choose icons for each stage of the trace mats:')
                ->hideOnIndex();

        yield FormField::addColumn()
            ->hideOnDetail();
            yield BooleanField::new('traceMatsAnnounced', 'Were the mats announced?')
                ->hideOnIndex();
            yield BooleanField::new('traceMatsReleased', 'Were the mats released?')
                ->hideOnIndex();
            yield AssociationField::new('traceMatsCrimsonCalyx', '(Optional) Crimson Calyx that drops the mats:')
                ->hideOnIndex();
    }
}
