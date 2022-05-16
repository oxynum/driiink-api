<?php

namespace App\Controller\Admin;

use App\Entity\Barman;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BarmanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Barman::class;
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
