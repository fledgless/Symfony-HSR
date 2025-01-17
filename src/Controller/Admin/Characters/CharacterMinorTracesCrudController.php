<?php

namespace App\Controller\Admin\Characters;

use App\Entity\Characters\CharacterMinorTraces;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterMinorTracesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterMinorTraces::class;
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
