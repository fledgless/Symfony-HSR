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
                yield TextField::new('lcName', 'Name');
                yield SlugField::new('lcSlug', 'Slug')
                    ->setTargetFieldName('lcName');
                yield ChoiceField::new('lcRarity', 'Rarity')
                    ->renderExpanded()
                    ->setChoices([
                        '5-star' => '5-star',
                        '4-star' => '4-star',
                        '3-star' => '3-star',
                    ]);
                yield AssociationField::new('lcPath', 'Path');

            yield FormField::addColumn();
                yield AssociationField::new('lcIcons', 'Choose Light Cone icon and splash art:');
                yield TextEditorField::new('lcStory', 'Story');

        yield FormField::addColumn();
            yield BooleanField::new('lcAnnounced', 'Was the Light Cone officially announced?');
            yield BooleanField::new('lcReleased', 'Is the Light Cone released in-game?');
            yield ChoiceField::new('lcReleaseVersion', 'If announced, choose release version:')
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
            yield ChoiceField::new('lcObtainable', 'How can this Light Cone be obtained in game?')
                ->setChoices([
                    'Brilliant Fixation Banner',
                    'Permanent Banner',
                    'Limited Event Rewards',
                    "Herta's Shop",
                    'Battle Pass',
                    'Forgotten Hall',
                ]);
            yield IntegerField::new('lcBaseHp', 'Base HP');
            yield IntegerField::new('lcBaseAtk', 'Base ATK');
            yield IntegerField::new('lcBaseDef', 'Base DEF');

        yield FormField::addTab('Skill');
            yield FormField::addColumn();
                yield TextField::new('lcSkillName', 'Skill name');
                yield TextEditorField::new('lcSkillOne', 'Superimposition 1');
                yield TextEditorField::new('lcSkillTwo', 'Superimposition 2');
            yield FormField::addColumn();
                yield TextEditorField::new('lcSkillThree', 'Superimposition 3');
                yield TextEditorField::new('lcSkillFour', 'Superimposition 4');
                yield TextEditorField::new('lcSkillFive', 'Superimposition 5');

        
    }    
}
