<?php

namespace App\Controller\Admin;

use App\Entity\CrimsonCalyx;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CrimsonCalyxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CrimsonCalyx::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('crimsonCalyxName');
        yield AssociationField::new('crimsonCalyxLocation');
        yield AssociationField::new('traceMats');
        yield AssociationField::new('crimsonCalyxEnemies');
    }
}
