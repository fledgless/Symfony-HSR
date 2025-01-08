<?php

namespace App\Controller\Admin;

use App\Entity\Domains\StagnantShadow;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StagnantShadowCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StagnantShadow::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('stagnantShadowName');
        yield AssociationField::new('stagnantShadowLocation');
        yield AssociationField::new('stagnantShadowIcon');
        yield AssociationField::new('bossMat');
        yield AssociationField::new('stagnantShadowBoss');
    }
}
