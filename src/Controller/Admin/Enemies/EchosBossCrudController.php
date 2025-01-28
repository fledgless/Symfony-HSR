<?php

namespace App\Controller\Admin\Enemies;

use App\Entity\Enemies\EchosBoss;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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

        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory'); 

        yield ImageField::new('filename', 'Icon')
                    ->setBasePath($uploadDir)
                    ->setUploadDir($mediaDir)
                    ->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield AssociationField::new('weaknesses');
        yield AssociationField::new('echoOfWar', 'Affiliated Echo of War:');
    }
}
