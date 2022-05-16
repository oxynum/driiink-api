<?php

namespace App\Controller\Admin;

use App\Entity\Barman;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class BarmanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Barman::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            ChoiceField::new('gender')->setChoices([
                'Homme' => 'Homme',
                'Femme' => 'Femme',
                'Autre' => 'Autre'
            ]),
            TextField::new('firstName'),
            TextField::new('lastName'),
            TextField::new('email'),
            TextField::new('phone'),
            TextField::new('password')->hideOnIndex()->hideWhenUpdating()->setFormType(PasswordType::class),
            ChoiceField::new('roles')->allowMultipleChoices()->setChoices([
                'Barmen' => 'ROLE_BAROWNER',
                'User' => 'ROLE_USER',
            ]),
            ImageField::new('picture')
                ->setUploadDir('public/uploads/barmen')
                ->setBasePath('uploads/barmen')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/png, image/jpeg'
                    ]
                ]),
            AssociationField::new('barOwned')->hideOnIndex(),
            TimeField::new('createdAt')->setDisabled()->hideOnForm()->setTimezone('Europe/Paris')->setFormat('dd/MM/y HH:mm:ss'),
            TimeField::new('updatedAt')->setDisabled()->hideOnForm()->setTimezone('Europe/Paris')->setFormat('dd/MM/y HH:mm:ss'),
        ];
    }

}
