<?php

namespace App\Controller\Admin;

use App\Entity\Media;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Media::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield ChoiceField::new('category')
            ->setChoices([
                'Character' => 'Character',
                'Light cone' => 'Light cone',
            ]);

        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield TextField::new('name', 'Nom');
        yield TextField::new('alttext', 'Texte alternatif');

        $imageField = ImageField::new('filename', 'Image')
            ->setBasePath($uploadDir)
            ->setUploadDir($mediaDir)
            ->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        if (Crud::PAGE_EDIT == $pageName) {
            $imageField->setRequired(false);
        }

        yield $imageField;
    }
}
