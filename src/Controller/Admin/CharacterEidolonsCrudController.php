<?php

namespace App\Controller\Admin;

use App\Entity\CharacterEidolons;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
        yield AssociationField::new('characterName');
        yield ArrayField::new('eidolonNames');
        yield ArrayField::new('eidolonDescriptions');
    }
    
}
