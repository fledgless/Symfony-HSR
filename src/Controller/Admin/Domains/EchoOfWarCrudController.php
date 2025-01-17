<?php

namespace App\Controller\Admin\Domains;

use App\Entity\Domains\EchoOfWar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EchoOfWarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EchoOfWar::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield AssociationField::new('location');
        yield AssociationField::new('icon');
        yield AssociationField::new('weeklyMat');
        yield AssociationField::new('boss');
    }
}

