<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Utilisateur extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsename('utilisateur95@gmail.com');
        $user->setRoles(['role-SUP_ADMIN']);
        $user->setPassword('mondps');
        $user->setNom('gueye');
        $user->setPrenom('soda');
        $user->setIsActif('true');

        // $product = new Product();
         $manager->persist($user);

        $manager->flush();

    }
}
