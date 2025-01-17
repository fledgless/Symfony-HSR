<?php

namespace App\Controller\Admin\Enemies;

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
        yield TextField::new('name');
        yield AssociationField::new('icon');
        yield AssociationField::new('weaknesses');
        yield AssociationField::new('echoOfWar', 'Affiliated Echo of War:');
    }
}
