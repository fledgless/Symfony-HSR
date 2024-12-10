<?php

namespace App\Controller\Admin;

use App\Entity\EchoOfWar;
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
        yield TextField::new('echoOfWarName');
        yield AssociationField::new('echoOfWarLocation');
        yield AssociationField::new('echoOfWarIcon');
        yield AssociationField::new('weeklyMat');
        yield AssociationField::new('echoOfWarBoss');
    }
}
