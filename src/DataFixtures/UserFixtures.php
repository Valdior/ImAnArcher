<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $user = new User();

        $password = $this->encoder->hashPassword($user, 'user');

        $user->setEmail('user@test.com')
            ->setUsername($faker->username())
            ->setPassword($password)
            ->isVerified(true);

        $manager->persist($user);

        $admin = new User();

        $password = $this->encoder->hashPassword($admin, 'admin');

        $admin->setEmail('admin@test.com')
            ->setUsername($faker->username())
            ->setPassword($password)
            ->setRoles(['ROLE_ADMIN'])
            ->isVerified(true);


        $manager->persist($admin);
        $manager->flush();
    }
}
