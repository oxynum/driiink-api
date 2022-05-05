<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Customers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();
        $admin->setEmail('admin@gmail.com');
        $password = $this->hasher->hashPassword($admin, 'admin');
        $admin->setPassword($password);
        $admin->setRoles([
            'ROLE_ADMIN',
            'ROLE_USER'
        ]);

        $manager->persist($admin);
        $manager->flush();

        for ($i = 10; $i <= 60; $i++){
            $customer = new Customers();
            $customer->setPhone('06 01 02 03 ' . $i);
            $customer->setRoles([
               'ROLE_USER'
            ]);
            $password = $this->hasher->hashPassword($admin, 'customer');
            $customer->setPassword($password);
            $customer->setFirstName('Customer');
            $customer->setLastName('N° ' . $i);
            $customer->setGender('Homme');
            $customer->setMail('customer' . $i . '@gmail.com');

            $manager->persist($customer);
        }

        $manager->flush($customer);

    }
}
