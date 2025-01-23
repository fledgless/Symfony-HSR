<?php

namespace App\Controller\Admin\Memosprites;

use App\Entity\Memosprites\MemospriteTalent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MemospriteTalentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MemospriteTalent::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
