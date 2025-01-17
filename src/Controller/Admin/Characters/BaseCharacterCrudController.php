<?php

namespace App\Controller\Admin\Characters;

use App\Entity\Characters\BaseCharacter;
use App\Entity\Media;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BaseCharacterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BaseCharacter::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'New character')
            ->setPageTitle('index', 'Characters')
            ->setPageTitle('detail', 'Character information')
            ->setPageTitle('edit', 'Edit current character');
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Character');
            yield FormField::addColumn()
                ->hideOnDetail();
                yield TextField::new('name');
                yield SlugField::new('slug')
                    ->setTargetFieldName('name')
                    ->hideOnIndex();
                yield ChoiceField::new('rarity')
                    ->renderExpanded()
                    ->setChoices([
                        '5-star' => '5-star',
                        '4-star' => '4-star',
                        'Trailblazer' => 'Trailblazer',
                    ]);
                yield AssociationField::new('path');
                yield AssociationField::new('type');

            yield FormField::addColumn()
                    ->hideOnDetail();
                yield BooleanField::new('announced', 'Announced?');
                yield BooleanField::new('released', 'Released?');
                yield ChoiceField::new('releaseVersion')
                    ->setChoices([
                        '1.0' => '1.0', 
                        '1.1' => '1.1', 
                        '1.2' => '1.2', 
                        '1.3' => '1.3', 
                        '1.4' => '1.4', 
                        '1.5' => '1.5', 
                        '1.6' => '1.6',
        
                        '2.0' => '2.0', 
                        '2.1' => '2.1', 
                        '2.2' => '2.2', 
                        '2.3' => '2.3', 
                        '2.4' => '2.4', 
                        '2.5' => '2.5', 
                        '2.6' => '2.6', 
                        '2.7' => '2.7',
        
                        '3.0' => '3.0',
                        '3.1' => '3.1',
                    ]);
                yield DateField::new('releaseDate');
                yield TextField::new('bannerName')
                    ->hideOnIndex();
                yield AssociationField::new('icons', 'Associate character icon and character splash art:')
                    ->hideOnIndex();

        yield FormField::addTab('Mats');
            yield AssociationField::new('ascMats')
                ->hideOnIndex();
            yield AssociationField::new('bossMat')
                ->hideOnIndex();
            yield AssociationField::new('traceMats')
                ->hideOnIndex();
            yield AssociationField::new('weeklyMat')
                ->hideOnIndex();
    }
}
