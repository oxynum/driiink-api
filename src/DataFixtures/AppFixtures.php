<?php

namespace App\DataFixtures;

use App\Entity\Bar;
use App\Entity\Groupe;
use App\Entity\Ingredient;
use App\Entity\Menu;
use App\Entity\Order;
use App\Entity\OrderStatus;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++){
            $groupe = new Groupe();
            $groupe->setName('Groupe ' . $i);
            $manager->persist($groupe);
        }

        $manager->flush();

        $status = new OrderStatus();
        $status->setName('En cours');
        $status->setRefund(false);
        $manager->persist($status);
        $manager->flush();

        $status = new OrderStatus();
        $status->setName('Terminé');
        $status->setRefund(false);
        $manager->persist($status);
        $manager->flush();

        $status = new OrderStatus();
        $status->setName('Archivé');
        $status->setRefund(false);
        $manager->persist($status);
        $manager->flush();

        $status = new OrderStatus();
        $status->setName('Remboursé');
        $status->setRefund(true);
        $manager->persist($status);
        $manager->flush();

        for ($i = 0; $i <= 100; $i++){
            $ingredient = new Ingredient();
            $ingredient->setName('Ingredient n°' . $i);
            $ingredient->setDescription('Ceci est une description');
            $manager->persist($ingredient);
        }

        $manager->flush();

        $gr = $manager->getRepository(Groupe::class);
        $allGroupe = $gr->findAll();

        for ($i = 0; $i <= 20; $i++){
            $bar = new Bar();
            $bar->setName('Bar n°' .$i);
            $bar->setGroupe($allGroupe[rand(0, count($allGroupe) - 1)]);
            $manager->persist($bar);
        }
        $manager->flush();

        $br = $manager->getRepository(Bar::class);
        $allBar = $br->findAll();


        $ir = $manager->getRepository(Ingredient::class);
        $allIngredient = $ir->findAll();


        for ($i = 0; $i <= 50; $i++){
            $product = new Products();
            $product->setName('Produit n°' . $i);
            $product->setDescription('Ceci est une description');
            $product->setPrice(rand(100,10000));
            $product->setPrepTime(\DateTime::createFromFormat('i:s', "02:00"));
            $product->addIngredient($allIngredient[rand(0, count($allIngredient) - 1)]);
            $manager->persist($product);
        }
        $manager->flush();

        $pr = $manager->getRepository(Products::class);
        $allProduct = $pr->findAll();

        for ($i = 0; $i <= 5; $i++){
            $menu = new Menu();
            $menu->setName('Menu N° ' . $i);
            $menu->setActiveUntil(new \DateTimeImmutable());
            $menu->setBar($allBar[rand(0, count($allBar) - 1)]);
            for($j = 0; $j <= 10; $j++){
                $menu->addProduct($allProduct[rand(0, count($allProduct) - 1)]);
            }
            $manager->persist($menu);
        }

        $manager->flush();
    }
}
