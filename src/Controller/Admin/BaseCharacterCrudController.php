<?php

namespace App\Controller\Admin;

use App\Entity\BaseCharacter;
use App\Entity\Media;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
        yield ChoiceField::new('characterRarity')
            ->renderExpanded()
            ->setChoices([
                '5-star' => '5-star',
                '4-star' => '4-star',
                'Trailblazer' => 'Trailblazer',
            ]);
        yield AssociationField::new('media');

        yield FormField::addColumn()
            ->hideOnDetail();
        yield ChoiceField::new('characterPath')
            ->renderExpanded()
            ->setChoices([
                'Destruction' => 'Destruction',
                'The Hunt' => 'The Hunt',
                'Erudition' => 'Erudition',
                'Harmony' => 'Harmony',
                'Nihility' => 'Nihility',
                'Preservation' => 'Preservation',
                'Abundance' => 'Abundance',
                'Unknown' => 'Unknown',
            ]);

        yield FormField::addColumn()
            ->hideOnDetail();
        yield ChoiceField::new('characterType')
            ->renderExpanded()
            ->setChoices([
                'Physical' => 'Physical',
                'Fire' => 'Fire',
                'Ice' => 'Ice',
                'Lightning' => 'Lightning',
                'Wind' => 'Wind',
                'Quantum' => 'Quantum',
                'Imaginary' => 'Imaginary',
                'Unknown' => 'Unknown',
            ]);
    }
}
