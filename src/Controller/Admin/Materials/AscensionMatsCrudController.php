<?php

namespace App\Controller\Admin\Materials;

use App\Entity\Materials\AscensionMats;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AscensionMatsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AscensionMats::class;
    }

    public function configureCrud(Crud $crud): Crud
    {    
        return $crud
            ->setPageTitle('new', 'New ascension mats')
            ->setPageTitle('index', 'Ascension materials')
            ->setPageTitle('detail', 'Ascension mats information')
            ->setPageTitle('edit', 'Edit current ascension mats');
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
            yield AssociationField::new('icons', 'Choose icons for each stage of the ascension mats:')
                ->hideOnIndex();

        yield FormField::addColumn()
            ->hideOnDetail();
            yield BooleanField::new('announced', 'Announced?')
                ->hideOnIndex();
            yield BooleanField::new('released', 'Released?')
                ->hideOnIndex();
            yield AssociationField::new('enemies', '(Optional) Enemies that drop the mats:')
                ->hideOnIndex();
            yield AssociationField::new('goldenCalyxes', '(Optional) Golden Calyxes that drop the mats:')
                ->hideOnIndex();
    }
}
