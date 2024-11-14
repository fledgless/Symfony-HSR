<?php

namespace App\Controller\Admin;

use App\Entity\LightCone;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
        yield TextField::new('lcName', 'Name');
        yield AssociationField::new('media');
        yield TextEditorField::new('lcStory', 'Story');

        yield FormField::addColumn();  
        yield ChoiceField::new('lcRarity', 'Rarity')
            ->renderExpanded()
            ->setChoices([
                '5-star' => '5-star',
                '4-star' => '4-star',
                '3-star' => '3-star',
            ]);
        yield ChoiceField::new('lcPath', 'Path')
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

        yield FormField::addTab('Skill');
        yield TextField::new('lcSkillName', 'Skill');
        yield TextEditorField::new('lcSkillOne', 'S1');
        yield TextEditorField::new('lcSkillTwo', 'S2');
        yield TextEditorField::new('lcSkillThree', 'S3');
        yield TextEditorField::new('lcSkillFour', 'S4');
        yield TextEditorField::new('lcSkillFive', 'S5');
    }    
}
