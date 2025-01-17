<?php

namespace App\Controller\Admin\Characters;

use App\Entity\Characters\CharacterStories;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterStoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterStories::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('character');
        yield TextareaField::new('characterDetails');
        yield TextareaField::new('characterStoryPartOne');
        yield TextareaField::new('characterStoryPartTwo');
        yield TextareaField::new('characterStoryPartThree');
        yield TextareaField::new('characterStoryPartFour');
    }
}
