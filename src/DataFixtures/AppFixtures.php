<?php

namespace App\DataFixtures;

use App\Entity\Bar;
use App\Entity\Groupe;
use App\Entity\Ingredient;
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
        $manager->persist($status);
        $manager->flush();

        $status = new OrderStatus();
        $status->setName('Terminé');
        $manager->persist($status);
        $manager->flush();

        $status = new OrderStatus();
        $status->setName('Archivé');
        $manager->persist($status);
        $manager->flush();

        $status = new OrderStatus();
        $status->setName('Remboursé');
        $manager->persist($status);
        $manager->flush();

        for ($i = 0; $i <= 100; $i++){
            $ingredient = new Ingredient();
            $ingredient->setName('Ingredient n°' . $i);
            $manager->persist($ingredient);
        }

        $manager->flush();

        $gr = $manager->getRepository(Groupe::class);
        $allGroupe = $gr->findAll();

        for ($i = 0; $i <= 20; $i++){
            $bar = new Bar();
            $bar->setName('Bar n°' .$i);
            $bar->setGroupeID($allGroupe[rand(0, count($allGroupe) - 1)]);
            $manager->persist($bar);
        }
        $manager->flush();


        $ir = $manager->getRepository(Ingredient::class);
        $allIngredient = $ir->findAll();

        $br = $manager->getRepository(Bar::class);
        $allBar = $br->findAll();

        for ($i = 0; $i <= 50; $i++){
            $product = new Products();
            $product->setName('Produit n°' . $i);
            $product->setDescription('Ceci est une description');
            $product->setPrice(rand(100,10000));
            $product->setBar($allBar[rand(0, count($allBar) - 1)]);
            $product->addIngredientID($allIngredient[rand(0, count($allIngredient) - 1)]);
            $manager->persist($product);
        }
        $manager->flush();


    }
}
