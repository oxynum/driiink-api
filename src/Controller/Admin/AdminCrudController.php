<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminCrudController extends AbstractCrudController
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $password = $this->hasher->hashPassword($entityInstance, $entityInstance->getPassword());
        $entityInstance->setPassword($password);

        $entityManager->persist($entityInstance);
        $entityManager->flush();
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('email'),
            TextField::new('password')->hideOnIndex()->hideWhenUpdating()->setFormType(PasswordType::class),
            ChoiceField::new('roles')->allowMultipleChoices()->setChoices([
                'Administrator' => 'ROLE_ADMIN',
                'Barmen' => 'ROLE_BAROWNER',
                'User' => 'ROLE_USER',
            ]),
            TextField::new('picture'),
            TimeField::new('createdAt')->setDisabled()->hideOnForm()->setTimezone('Europe/Paris')->setFormat('dd/MM/y HH:mm:ss'),
            TimeField::new('updatedAt')->setDisabled()->hideOnForm()->setTimezone('Europe/Paris')->setFormat('dd/MM/y HH:mm:ss'),
        ];
    }

}