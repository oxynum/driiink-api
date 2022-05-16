<?php

namespace App\Controller\Admin;

use App\Entity\Bar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bar::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('name'),
            ImageField::new('picture')
                ->setUploadDir('public/uploads/bar')
                ->setBasePath('uploads/bar')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/png, image/jpeg'
                    ]
                ]),
            AssociationField::new('groupeID')->setDisabled(),
        ];
    }

}