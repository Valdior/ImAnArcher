<?php

namespace App\DataFixtures;

use App\Entity\Affiliate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AffialiteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $affiliate = new Affiliate();
        $affiliate->setLicence("414022");
        $affiliate->setAffiliateSince(new \DateTime("10/01/2014"));
        $affiliate->setAffiliateEnd(new \DateTime("09/30/2016"));
        $affiliate->setClub($this->getReference(ClubFixtures::CLUB_ITW));
        $affiliate->setArcher($this->getReference(UserFixtures::ARCHER_MP));
        $manager->persist($affiliate);

        $affiliate = new Affiliate();
        $affiliate->setLicence("89H01558");
        $affiliate->setAffiliateSince(new \DateTime("10/01/2016"));
        $affiliate->setAffiliateEnd(new \DateTime("09/30/2019"));
        $affiliate->setClub($this->getReference(ClubFixtures::CLUB_LIE));
        $affiliate->setArcher($this->getReference(UserFixtures::ARCHER_MP));
        $manager->persist($affiliate);

        $affiliate = new Affiliate();
        $affiliate->setLicence("89H01558");
        $affiliate->setAffiliateSince(new \DateTime("10/01/2019"));
        $affiliate->setClub($this->getReference(ClubFixtures::CLUB_ITW));
        $affiliate->setArcher($this->getReference(UserFixtures::ARCHER_MP));
        $manager->persist($affiliate);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClubFixtures::class,
            UserFixtures::class
        );
    }
}
