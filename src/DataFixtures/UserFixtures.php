<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

//this is not good
//use Symfony\Component\Security\Core\User\User;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {

        
        $user = new User();
        $user->setEmail('chriscarton@live.fr');
        $user->setRoles(['ROLE_ADMIN']);

        //Il y a un problème sur le mot de passe
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'motdepasse'
        ));

        $manager->persist($user);
        $manager->flush();
    }
}
