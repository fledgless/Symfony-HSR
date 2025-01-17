<?php

namespace App\Controller\Admin\Characters;

use App\Entity\Characters\CharacterBasicAtk;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterBasicAtkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterBasicAtk::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'New Basic ATK')
            ->setPageTitle('index', 'Basic ATKs')
            ->setPageTitle('detail', 'Basic ATK info')
            ->setPageTitle('edit', 'Edit Basic ATK');
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Basic info');
            yield FormField::addColumn();
                yield TextField::new('name');
                yield AssociationField::new('characterKit');
                yield ChoiceField::new('type')
                    ->setChoices([
                        'AoE' => 'AoE',
                        'Blast' => 'Blast',
                        'Bounce' => 'Bounce',
                        'Defense' => 'Defense',
                        'Enhance' => 'Enhance',
                        'Impair' => 'Impair',
                        'Restore' => 'Restore',
                        'Single Target' => 'Single Target',
                        'Summon' => 'Summon',
                        'Support' => 'Support',
                    ]);
                yield AssociationField::new('icons')
                    ->hideOnIndex();
            yield FormField::addColumn();
                yield IntegerField::new('energyGain')
                    ->hideOnIndex();
                yield IntegerField::new('breakMainTarget', 'Break (main target)')
                    ->hideOnIndex();
                yield IntegerField::new('breakAdjacentTargets', 'Break (adjacent targets)')
                    ->hideOnIndex();
                yield BooleanField::new('enhanced', 'Enhanced?');

        yield FormField::addTab('Description');
            yield FormField::addRow();
                yield TextEditorField::new('descLevelOne', 'Level 1')
                    ->hideOnIndex();
                yield TextEditorField::new('descLevelTwo', 'Level 2')
                    ->hideOnIndex();
            yield FormField::addRow();
                yield TextEditorField::new('descLevelThree', 'Level 3')
                    ->hideOnIndex();
                yield TextEditorField::new('descLevelFour', 'Level 4')
                    ->hideOnIndex();
            yield FormField::addRow();
                yield TextEditorField::new('descLevelFive', 'Level 5')
                    ->hideOnIndex();
                yield TextEditorField::new('descLevelSix', 'Level 6')
                    ->hideOnIndex();
                yield TextEditorField::new('descLevelSeven', 'Level 7')
                    ->hideOnIndex();
    }
}
