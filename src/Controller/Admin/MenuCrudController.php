<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\Validator\Constraints\Time;

class MenuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menu::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('name'),
            AssociationField::new('products'),
            AssociationField::new('bar'),
            TimeField::new('activeAt')->setFormat('HH:mm:ss'),
            TimeField::new('desactiveAt')->setFormat('HH:mm:ss'),
            TimeField::new('createdAt')->setDisabled()->hideOnForm()->setTimezone('Europe/Paris')->setFormat('dd/MM/y HH:mm:ss'),
            TimeField::new('updatedAt')->setDisabled()->hideOnForm()->setTimezone('Europe/Paris')->setFormat('dd/MM/y HH:mm:ss'),
        ];
    }

}
