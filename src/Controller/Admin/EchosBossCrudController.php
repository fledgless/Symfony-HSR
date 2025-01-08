<?php

namespace App\Controller\Admin;

use App\Entity\Enemies\EchosBoss;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EchosBossCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EchosBoss::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('echoBossName');
        yield AssociationField::new('echoBossIcon');
        yield AssociationField::new('echoBossWeaknesses');
        yield AssociationField::new('echoOfWar', 'Affiliated Echo of War:');
    }
}
