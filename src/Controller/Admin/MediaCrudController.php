<?php

namespace App\Controller\Admin;

use App\Entity\Media;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
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
        yield FormField::addTab('Stats');
        yield ChoiceField::new('category')
            ->renderExpanded()
            ->setChoices([
                'Character' => 'Character',
                'Light cone' => 'Light cone',
            ]);
        yield ChoiceField::new('imageRole')
            ->setChoices([
                'Character: Icon' => 'Icon',
                'Character Splash art' => 'Splash art',
                'Eidolon: E1' => 'E1',
                'Eidolon: E2' => 'E2',
                'Eidolon: E3' => 'E3',
                'Eidolon: E4' => 'E4',
                'Eidolon: E5' => 'E5',
                'Eidolon: E6' => 'E6',
            ]);

        yield FormField::addTab('Upload media');
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
