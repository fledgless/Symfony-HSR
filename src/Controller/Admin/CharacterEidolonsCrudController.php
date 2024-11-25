<?php

namespace App\Controller\Admin;

use App\Entity\CharacterEidolons;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterEidolonsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterEidolons::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Base');
        yield AssociationField::new('characterName');
        yield TextEditorField::new('stopPoint');
        yield AssociationField::new('media');

        yield FormField::addTab('E1');
        yield ArrayField::new('eidolonOne');

        yield FormField::addTab('E2');
        yield ArrayField::new('eidolonTwo');

        yield FormField::addTab('E3');
        yield ArrayField::new('eidolonThree');

        yield FormField::addTab('E4');
        yield ArrayField::new('eidolonFour');

        yield FormField::addTab('E5');
        yield ArrayField::new('eidolonFive');

        yield FormField::addTab('E6');
        yield ArrayField::new('eidolonSix');
    }
    
}
