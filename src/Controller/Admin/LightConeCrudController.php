<?php

namespace App\Controller\Admin;

use App\Entity\LightCone;
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

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Stats');
        yield TextField::new('lcName');
        yield ChoiceField::new('lcPath')
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


        yield FormField::addTab('Details');
        yield AssociationField::new('media');
    }
}
