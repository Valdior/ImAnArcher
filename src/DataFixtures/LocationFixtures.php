<?php

namespace App\DataFixtures;

use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture
{
    public const LOC_ITW = "loc-itw";

    public function load(ObjectManager $manager)
    {
        $location = new Location();
        $location->setTitle("Centre culturel de Welkenraedt")
                 ->setStreet("Rue Grétry")
                 ->setNumber(10)
                 ->setPostalcode(4840)
                 ->setCity("Welkenraedt")
                 ->setLocality("Centre culturel de Welkenraedt");
        $manager->persist($location);

        $this->addReference(self::LOC_ITW, $location);

        $manager->flush();
    }
}
