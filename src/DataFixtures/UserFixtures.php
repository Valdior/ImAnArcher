<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const USER_ADMIN = "user-admin";
    public const USER_USER = "user-user";
    public const ARCHER_MP = "archer-mp";

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
            ->setFirstname($faker->firstname())
            ->setLastname($faker->lastname())
            ->setIsVerified(true);

        $manager->persist($user);
        $this->addReference(self::USER_USER, $user);

        $admin = new User();

        $password = $this->encoder->hashPassword($admin, 'admin');

        $admin->setEmail('admin@test.com')
            ->setUsername($faker->username())
            ->setPassword($password)
            ->setRoles(['ROLE_ADMIN'])
            ->setFirstname($faker->firstname())
            ->setLastname($faker->lastname())
            ->setIsVerified(true);

        $this->addReference(self::ARCHER_MP, $admin);
        $this->addReference(self::USER_ADMIN, $admin);


        $manager->persist($admin);
        $manager->flush();
    }
}
