<?php

namespace App\Controller\Admin;

use App\Entity\LightCone;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LightConeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LightCone::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'New light cone');
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Base LC');
            yield FormField::addColumn();
                yield TextField::new('name');
                yield SlugField::new('slug')
                    ->setTargetFieldName('name');
                yield ChoiceField::new('rarity')
                    ->renderExpanded()
                    ->setChoices([
                        '5-star' => '5-star',
                        '4-star' => '4-star',
                        '3-star' => '3-star',
                    ]);
                yield AssociationField::new('path');

            yield FormField::addColumn();
                yield AssociationField::new('icons')
                    ->hideOnForm();
                yield TextEditorField::new('story')
                    ->hideOnIndex();

        yield FormField::addColumn();
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
            yield ChoiceField::new('obtainable', 'How can this Light Cone be obtained in game?')
                ->hideOnIndex()
                ->setChoices([
                    'Brilliant Fixation Banner' => 'Brilliant Fixation Banner',
                    'Permanent Banner' => 'Permanent Banner',
                    'Limited Event Rewards' => 'Limited Event Rewards',
                    "Herta's Shop" => "Herta's Shop",
                    'Battle Pass' => 'Battle Pass',
                    'Forgotten Hall' => 'Forgotten Hall',
                ]);
            yield IntegerField::new('baseHp', 'Base HP');
            yield IntegerField::new('baseAtk', 'Base ATK');
            yield IntegerField::new('baseDef', 'Base DEF');

        yield FormField::addTab('Skill');
            yield FormField::addColumn();
                yield TextField::new('skillName')->hideOnIndex();
                yield TextEditorField::new('superimpositionOne')->hideOnIndex();
                yield TextEditorField::new('superimpositionTwo')->hideOnIndex();
            yield FormField::addColumn();
                yield TextEditorField::new('superimpositionThree')->hideOnIndex();
                yield TextEditorField::new('superimpositionFour')->hideOnIndex();
                yield TextEditorField::new('superimpositionFive')->hideOnIndex();

        yield FormField::addTab('Mats');
            yield AssociationField::new('ascMats')->hideOnIndex();
            yield AssociationField::new('traceMats')->hideOnIndex();
    }    
}
