<?php

namespace App\Controller\Admin;

use App\Entity\BaseCharacter;
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
                yield TextField::new('characterName', 'Name');
                yield SlugField::new('characterSlug', 'Slug')
                    ->setTargetFieldName('characterName')
                    ->hideOnIndex();
                yield ChoiceField::new('characterRarity', 'Rarity')
                    ->renderExpanded()
                    ->setChoices([
                        '5-star' => '5-star',
                        '4-star' => '4-star',
                        'Trailblazer' => 'Trailblazer',
                    ]);
                yield AssociationField::new('characterPath', 'Path');
                yield AssociationField::new('characterType', 'Type');

            yield FormField::addColumn()
                    ->hideOnDetail();
                yield BooleanField::new('characterAnnounced', 'Announced?');
                yield BooleanField::new('characterReleased', 'Released?');
                yield ChoiceField::new('characterReleaseVersion', 'Version')
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
                yield DateField::new('characterReleaseDate', 'Release date');
                yield TextField::new('characterBannerName')
                    ->hideOnIndex();
                yield AssociationField::new('characterIcons', 'Associate character icon and character splash art:')
                    ->hideOnIndex();

        yield FormField::addTab('Mats');
            yield AssociationField::new('characterAscMats')
                ->hideOnIndex();
            yield AssociationField::new('characterBossMat')
                ->hideOnIndex();
            yield AssociationField::new('characterTraceMats')
                ->hideOnIndex();
            yield AssociationField::new('characterWeeklyMat')
                ->hideOnIndex();
    }
}
