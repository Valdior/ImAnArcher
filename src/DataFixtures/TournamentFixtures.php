<?php

namespace App\DataFixtures;

use App\Entity\Tournament;
use App\Enum\TournamentTypeEnum;
use App\DataFixtures\LocationFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TournamentFixtures extends Fixture implements DependentFixtureInterface
{
    public const TOURN_ACG = "tourn-acg";
    public const TOURN_ADS = "tourn-ads";
    public const TOURN_MDY = "tourn-mdy";
    public const TOURN_ACG_1 = "toun-acg-1";
    public const TOURN_ACG_2 = "toun-acg-2";
    public const TOURN_LIE = "toun-lie";
    public const TOURN_TEL = "toun-tel";
    public const TOURN_ITW = "toun-itw";
    public const TOURN_ITW_OUT = "toun-itw-out";
    public const TOURN_HUY = "toun-huy";

    public const TOURN_FBG = "tourn-fbg";
    public const TOURN_BEA = "tourn-bea";
    public const TOURN_CAB = "tounr-cab";
    public const TOURN_CMA = "tounr-cma";
    public const TOURN_GSR = "tounr-gsr";

    public function load(ObjectManager $manager)
    {
        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("09/08/2018"));
        $tournament->setEndDate(new \DateTime("09/09/2018"));
        $tournament->setType(TournamentTypeEnum::Outdoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ACG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ACG, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("10/20/2018"));
        $tournament->setEndDate(new \DateTime("10/21/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ADS));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ADS, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("11/18/2018"));
        $tournament->setEndDate(new \DateTime("11/18/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_MDY));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_MDY, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("11/24/2018"));
        $tournament->setEndDate(new \DateTime("11/25/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ACG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ACG_1, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("12/16/2018"));
        $tournament->setEndDate(new \DateTime("12/16/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_LIE));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_LIE, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("01/12/2019"));
        $tournament->setEndDate(new \DateTime("01/13/2019"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ACG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ACG_2, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("01/13/2024"));
        $tournament->setEndDate(new \DateTime("01/14/2024"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ITW));
        $tournament->setLocation($this->getReference(LocationFixtures::LOC_ITW));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ITW, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("02/23/2019"));
        $tournament->setEndDate(new \DateTime("02/23/2019"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_LIE));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_TEL, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("03/09/2019"));
        $tournament->setEndDate(new \DateTime("03/10/2019"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_HUY));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_HUY, $tournament);
        $tournament->setStartDate(new \DateTime("10/06/2018"));
        $tournament->setEndDate(new \DateTime("10/07/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_FBG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_FBG, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("10/13/2018"));
        $tournament->setEndDate(new \DateTime("10/14/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_BEA));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_BEA, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("10/14/2018"));
        $tournament->setEndDate(new \DateTime("10/14/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_CAB));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_CAB, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("11/10/2018"));
        $tournament->setEndDate(new \DateTime("11/11/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_CMA));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_CMA, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("12/08/2018"));
        $tournament->setEndDate(new \DateTime("12/09/2018"));
        $tournament->setType(TournamentTypeEnum::Indoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_GSR));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_GSR, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("05/14/2023"));
        $tournament->setEndDate(new \DateTime("05/14/2023"));
        $tournament->setType(TournamentTypeEnum::Outdoor);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ITW));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ITW_OUT, $tournament);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClubFixtures::class,
            LocationFixtures::class,
        );
    }
}
