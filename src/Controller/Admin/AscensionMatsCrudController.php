<?php

namespace App\Controller\Admin;

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
            yield TextField::new('ascMatFourStarName', '4-star ascension mat');
            yield TextField::new('ascMatThreeStarName', '3-star ascension mat');
            yield TextField::new('ascMatTwoStarName', '2-star ascension mat');
            yield SlugField::new('slug')
                ->setTargetFieldName('ascMatFourStarName')
                ->hideOnIndex();
            yield AssociationField::new('ascMatIcons', 'Choose icons for each stage of the ascension mats:')
                ->hideOnIndex();

        yield FormField::addColumn()
            ->hideOnDetail();
            yield BooleanField::new('ascMatAnnounced', 'Were the mats announced?')
                ->hideOnIndex();
            yield BooleanField::new('ascMatReleased', 'Were the mats released?')
                ->hideOnIndex();
            yield AssociationField::new('ascMatsEnemies', '(Optional) Enemies that drop the mats:')
                ->hideOnIndex();
            yield AssociationField::new('goldenCalyxes', '(Optional) Golden Calyxes that drop the mats:')
                ->hideOnIndex();
    }
}
