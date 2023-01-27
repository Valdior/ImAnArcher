<?php

namespace App\DataFixtures;

use App\Entity\Peloton;
use App\Enum\PelotonTypeEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PelotonFixtures extends Fixture implements DependentFixtureInterface
{
    public const PELOTON_AGC_1 = "PELOTON_AGC_1";
    public const PELOTON_AGC_2 = "PELOTON_AGC_2";
    public const PELOTON_CMA = "PELOTON_CMA";
    public const PELOTON_GSR = "PELOTON_GSR";

    public function load(ObjectManager $manager)
    {
        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_25->value);
        $peloton->setStartime(new \DateTime("09/08/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
        $manager->persist($peloton);

        $this->addReference(self::PELOTON_AGC_1, $peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_25->value);
        $peloton->setStartime(new \DateTime("09/09/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
        $manager->persist($peloton);

        $this->addReference(self::PELOTON_AGC_2, $peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(28);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/20/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(28);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/20/2018 18:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(28);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/21/2018 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(28);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/21/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(68);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("11/18/2018 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_MDY));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(68);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("11/18/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_MDY));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/06/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/06/2018 18:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/07/2018 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/07/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("11/24/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("11/24/2018 18:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("11/25/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(96);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("12/16/2018 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_LIE));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(96);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("12/16/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_LIE));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("01/12/2019 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("01/12/2019 18:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("01/12/2019 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(92);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("01/20/2019 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ITW));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(92);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("01/20/2019 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ITW));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(15);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/13/2018 13:45:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(15);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/13/2018 19:15:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(15);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/14/2018 14:15:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(80);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/14/2018 14:00:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_CAB));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/10/2018 13:15:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_CMA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/10/2018 18:15:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_CMA));
        $manager->persist($peloton);

        $this->addReference(self::PELOTON_CMA, $peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/11/2018 09:15:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_CMA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/11/2018 13:45:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_CMA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/10/2018 18:00:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_GSR));
        $manager->persist($peloton);

        $this->addReference(self::PELOTON_GSR, $peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/11/2018 09:00:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_GSR));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipants(30);
        $peloton->setType(PelotonTypeEnum::TYPE_18->value);
        $peloton->setStartime(new \DateTime("10/11/2018 14:00:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_GSR));
        $manager->persist($peloton);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TournamentFixtures::class
        );
    }
}
