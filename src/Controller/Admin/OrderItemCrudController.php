<?php

namespace App\Controller\Admin;

use App\Entity\OrderItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class OrderItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OrderItem::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            AssociationField::new('product'),
            IntegerField::new('quantity'),
            AssociationField::new('orderRef'),
            TimeField::new('createdAt')->setDisabled()->hideOnForm()->setTimezone('Europe/Paris')->setFormat('dd/MM/y HH:mm:ss'),
            TimeField::new('updatedAt')->setDisabled()->hideOnForm()->setTimezone('Europe/Paris')->setFormat('dd/MM/y HH:mm:ss'),
        ];
    }

}
