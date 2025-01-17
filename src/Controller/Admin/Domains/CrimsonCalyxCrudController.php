<?php

namespace App\Controller\Admin\Domains;

use App\Entity\Domains\CrimsonCalyx;
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
        yield TextField::new('name');
        yield AssociationField::new('location');
        yield AssociationField::new('traceMats');
        yield AssociationField::new('enemies');
    }
}
