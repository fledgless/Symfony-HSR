<?php

namespace App\Controller\Admin\Enemies;

use App\Entity\Enemies\EliteEnemy;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EliteEnemyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EliteEnemy::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield AssociationField::new('icon');
        yield AssociationField::new('weaknesses');
        yield AssociationField::new('stagnantShadow', 'Affiliated Stagnant Shadow');
    }
}
