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
        yield FormField::addColumn()
            ->hideOnDetail();
        yield TextField::new('characterName');
        yield SlugField::new('slug')
            ->setTargetFieldName('characterName');
        yield ChoiceField::new('characterRarity')
            ->renderExpanded()
            ->setChoices([
                '5-star' => '5-star',
                '4-star' => '4-star',
                'Trailblazer' => 'Trailblazer',
            ]);

        yield FormField::addColumn()
            ->hideOnDetail();
        yield BooleanField::new('released');
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
                ]);
        yield DateField::new('releaseDate');
        yield AssociationField::new('media');
    }
}
