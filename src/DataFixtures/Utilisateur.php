<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Utilisateur extends Fixture
{
            private $passwordEncoder;
            public function __construct(UserPasswordEncoderInterface $passwordEncoder)
            {
                $this->passwordEncoder = $passwordEncoder;
            }

            public function load(ObjectManager $manager)
            {
            $supAdmin = new Role();
        $supAdmin->setLibelle("ROLE_SUP_ADMIN");
        $manager->persist($supAdmin);

        $Admin = new Role();
        $Admin->setLibelle("ROLE_ADMIN");
        $manager->persist($Admin);
        $Caissier = new Role    ();
        $Caissier->setLibelle("ROLE_CAISSIER");
        $manager->persist($Caissier);
      
        $this->addReference('role_admin', $Admin);
        $this->addReference('role_caissier', $Caissier);
                
                $manager->flush();

                $this->addReference('role_sup_admin', $supAdmin);
                ///$this->addReference('role_admin', $Admin);
                //$this->addReference('role_caissier', $Caissier);

                $rolAdmin = $this->getReference('role_sup_admin');
            
                
                $user = new User();
                
                $user->setUsename("gueyesoda56@gmail.com");
                $user->setPassword($this->passwordEncoder->encodePassword($user, "mnpasd"));
                $user->setRoles(["ROLE_SUP_ADMIN"]);
                $user->setRole($rolAdmin);
                $user->setNom("gueye");
                $user->setPrenom("soda");
                $user->setIsActif("true");
                $manager->persist($user);
                $manager->flush();


                }
}
