<?php

namespace App\Controller\Admin;

use App\Entity\GoldenCalyx;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GoldenCalyxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GoldenCalyx::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('goldenCalyxName');
        yield AssociationField::new('goldenCalyxLocation');
        yield AssociationField::new('goldenCalyxAscMats');
        yield AssociationField::new('goldenCalyxEnemies');
    }
}
