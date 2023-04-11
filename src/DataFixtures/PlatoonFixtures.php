<?php

namespace App\DataFixtures;

use App\Entity\Platoon;
use App\Enum\PlatoonTypeEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PlatoonFixtures extends Fixture implements DependentFixtureInterface
{
    public const PELOTON_AGC_1 = "PELOTON_AGC_1";
    public const PELOTON_AGC_2 = "PELOTON_AGC_2";
    public const PELOTON_CMA = "PELOTON_CMA";
    public const PELOTON_GSR = "PELOTON_GSR";

    public function load(ObjectManager $manager)
    {
        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_25);
        $platoon->setStartTime(new \DateTime("09/08/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
        $manager->persist($platoon);

        $this->addReference(self::PELOTON_AGC_1, $platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_25);
        $platoon->setStartTime(new \DateTime("09/09/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
        $manager->persist($platoon);

        $this->addReference(self::PELOTON_AGC_2, $platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(28);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/20/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(28);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/20/2018 18:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(28);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/21/2018 08:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(28);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/21/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(68);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("11/18/2018 08:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_MDY));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(68);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("11/18/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_MDY));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/06/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/06/2018 18:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/07/2018 08:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/07/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("11/24/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("11/24/2018 18:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("11/25/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(96);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("12/16/2018 08:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_LIE));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(96);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("12/16/2018 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_LIE));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("01/12/2019 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("01/12/2019 18:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("01/12/2019 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(92);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("01/20/2019 08:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ITW));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(92);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("01/20/2019 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ITW));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(15);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/13/2018 13:45:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(15);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/13/2018 19:15:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(15);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/14/2018 14:15:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(80);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/14/2018 14:00:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_CAB));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/10/2018 13:15:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_CMA));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/10/2018 18:15:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_CMA));
        $manager->persist($platoon);

        $this->addReference(self::PELOTON_CMA, $platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/11/2018 09:15:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_CMA));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/11/2018 13:45:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_CMA));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/10/2018 18:00:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_GSR));
        $manager->persist($platoon);

        $this->addReference(self::PELOTON_GSR, $platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/11/2018 09:00:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_GSR));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(30);
        $platoon->setType(PlatoonTypeEnum::TYPE_18);
        $platoon->setStartTime(new \DateTime("10/11/2018 14:00:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_GSR));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(128);
        $platoon->setType(PlatoonTypeEnum::TYPE_50_30);
        $platoon->setStartTime(new \DateTime("05/14/2023 08:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ITW_OUT));
        $manager->persist($platoon);

        $platoon = new Platoon();
        $platoon->setMaxParticipants(128);
        $platoon->setType(PlatoonTypeEnum::TYPE_25);
        $platoon->setStartTime(new \DateTime("05/14/2023 13:30:00"));
        $platoon->setTournament($this->getReference(TournamentFixtures::TOURN_ITW_OUT));
        $manager->persist($platoon);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TournamentFixtures::class
        );
    }
}
