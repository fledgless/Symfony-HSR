<?php

namespace App\Controller\Admin;

use App\Entity\BaseCharacter;
use App\Entity\Media;
use App\Repository\MediaRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BaseCharacterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BaseCharacter::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('characterName');
        yield ChoiceField::new('characterRarity')
            ->setChoices([
                '5-star' => '5-star',
                '4-star' => '4-star',
                'Trailblazer' => 'Trailblazer',
            ]);
        yield ChoiceField::new('characterPath')
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
        yield ChoiceField::new('characterType')
            ->setChoices([
                'Physical' => 'Physical',
                'Fire' => 'Fire',
                'Ice' => 'Ice',
                'Thunder' => 'Thunder',
                'Wind' => 'Wind',
                'Quantum' => 'Quantum',
                'Imaginary' => 'Imaginary',
                'Unknown' => 'Unknown',
            ]);
        yield AssociationField::new('media');
    }
}
