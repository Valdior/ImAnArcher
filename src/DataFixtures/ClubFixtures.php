<?php

namespace App\DataFixtures;

use App\Entity\Club;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ClubFixtures extends Fixture implements DependentFixtureInterface
{
    public const CLUB_LIE = "club-lie";
    public const CLUB_ITW = "club-itw";
    public const CLUB_ACG = "club-acg";
    public const CLUB_MDY = "club-mdy";
    public const CLUB_HUY = "club-huy";
    public const CLUB_FBG = "club-fbg";
    public const CLUB_BEA = "club-bea";
    public const CLUB_CAB = "club-cab";
    public const CLUB_ADS = "club-ads";
    public const CLUB_CMA = "club-cma";
    public const CLUB_GSR = "club-gsr";
    public const CLUB_ABA = "club-aba";
    public const CLUB_HAC = "club-hac";
    public const CLUB_LFU = "club-lfu";
    public const CLUB_GAU = "club-gau";
    public const CLUB_ANT = "club-ant";
    public const CLUB_PAC = "club-pac";

    public function load(ObjectManager $manager)
    {
        $club = new Club();
        $club->setName("Francs Archers d’Ottignies");
        $club->setAcronym("FAO");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $club->setEmail('info@fao.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Lasne Archery Sport");
        $club->setAcronym("LAS");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $club->setEmail('ilasnearcherysport@skynet.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Grand Serment de Saint-Sébastien Braine l’Alleud");
        $club->setAcronym("ABA");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $club->setEmail('aba@lfbta.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_ABA, $club);

        $club = new Club();
        $club->setName("Cardinal Mercier Archery");
        $club->setAcronym("CMA");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $club->setEmail('serge.jacques@ccmsports.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_CMA, $club);

        $club = new Club();
        $club->setName("Les Archers de Jodoigne");
        $club->setAcronym("ACG");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $club->setEmail('yves.philippaert@skynet.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Flèches Unies");
        $club->setAcronym("LFU");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $club->setEmail('lfu@lftba.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_LFU, $club);

        $club = new Club();
        $club->setName("Flèche d’Or d’Anderlecht");
        $club->setAcronym("FOA");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $club->setEmail('foa@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Grand Serment Royal des Archers de St Sébastien Bruxelles");
        $club->setAcronym("GSR");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $club->setEmail('gsr@lfbta.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_GSR, $club);

        $club = new Club();
        $club->setName("De Gouden Pijl Evere");
        $club->setAcronym("GPE");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $club->setEmail('gpe@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnie d’Arc St Sébastien Kraainem");
        $club->setAcronym("SSK");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $club->setEmail('adlardi@hotmail.com');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Gilde des Archers de Saint-Pierre");
        $club->setAcronym("GAU");
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $club->setEmail('adlardi@hotmail.com');
        $manager->persist($club);

        $this->addReference(self::CLUB_GAU, $club);

        $club = new Club();
        $club->setName("Confrérie St Sébastien Antoing");
        $club->setAcronym("ANT");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('eddy.wattiez@live.fr');
        $manager->persist($club);

        $this->addReference(self::CLUB_ANT, $club);

        $club = new Club();
        $club->setName("La Fine Equipe Ellezelles");
        $club->setAcronym("LFE");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('lfe@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Confrérie St Sébastien Beaumont");
        $club->setAcronym("BEA");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('st.sebastien.bea@gmail.com');
        $manager->persist($club);

        $this->addReference(self::CLUB_BEA, $club);

        $club = new Club();
        $club->setName("Club des Archers de Tournai");
        $club->setAcronym("CAT");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('cat@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Le Centaure Fleurus");
        $club->setAcronym("CEN");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('cen@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Cie des Archers du Château Gerpinnes");
        $club->setAcronym("CAC");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('cac@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Royale Confrérie St Sébastien de Mouscron");
        $club->setAcronym("RCM");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('rcm@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archery Club Labuissière");
        $club->setAcronym("LAB");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('lab@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnons de l’Arc Droit");
        $club->setAcronym("CAD");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('christianjolivet@msn.com');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Peruwelz Archery Club");
        $club->setAcronym("PAC");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('secretaire@pac-peruwelz.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_PAC, $club);

        $club = new Club();
        $club->setName("Les Francs Archers de Chimay");
        $club->setAcronym("FAC");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('fac@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Berceau de Thuin");
        $club->setAcronym("ABT");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('abt@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Le Sagittaire");
        $club->setAcronym("SAG");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('sag@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Château Binche");
        $club->setAcronym("ACB");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('acb315binche@gmail.com');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Sylver Star Charleroi");
        $club->setAcronym("SSC");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('ssc@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("E-cool Archery Club");
        $club->setAcronym("ECA");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('eca@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnies des Archers de Momignies");
        $club->setAcronym("CAM");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('annelorsi@hotmail.com');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Francs Archers des Collines");
        $club->setAcronym("ADC");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('francs.archers.des.collines@gmail.com');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnons Archers de Nalinnes");
        $club->setAcronym("CAN");
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $club->setEmail('can@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnie d’Arc du Liry Archery Chiny");
        $club->setAcronym("LAC");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('liryarcherychiny@gmail.com');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers de la Vallée des Macralles Vielsalm");
        $club->setAcronym("AMV");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('amv@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Archers Libramontois");
        $club->setAcronym("ASH");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('ash@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archery Club de la Famenne");
        $club->setAcronym("ACF");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('acf@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archery Club du Sud");
        $club->setAcronym("ASC");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('acs.secretaire@gmail.com');
        $manager->persist($club);

        $club = new Club();
        $club->setName("1ere Compagnie des Archers de Gaume - Musson");
        $club->setAcronym("CAG");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('cag@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("La Flèche de Musson");
        $club->setAcronym("FDM");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('anne.rahir@skynet.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Hotton Archery Club");
        $club->setAcronym("HAC");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('mu.alberty@skynet.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_HAC, $club);

        $club = new Club();
        $club->setName("Les Flèches Gaumaises - Virton");
        $club->setAcronym("FGV");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('eric.weyders@skynet.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Le Celtic Archery Club Léglise");
        $club->setAcronym("CAL");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('cal@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Club des Archers Arlonnais");
        $club->setAcronym("CAA");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('caa@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Club Des Archers Réunis");
        $club->setAcronym("CAR");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $club->setEmail('car@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Lum’çons Wierde");
        $club->setAcronym("LAW");
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $club->setEmail('law@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("La Magna Sagitta Pondrôme");
        $club->setAcronym("MSP");
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $club->setEmail('nestor.warscotte@hotmail.com');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Flèche Brisée de Godinne");
        $club->setAcronym("FBG");
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $club->setEmail('discofatigue@gmail.com');
        $manager->persist($club);

        $this->addReference(self::CLUB_FBG, $club);

        $club = new Club();
        $club->setName("Arrow Tabora Namur");
        $club->setAcronym("TAB");
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $club->setEmail('tab@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnons Archers de Bertransart");
        $club->setAcronym("CAB");
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $club->setEmail('ir.dadupont@gmail.com');
        $manager->persist($club);

        $this->addReference(self::CLUB_CAB, $club);

        $club = new Club();
        $club->setName("Les Bons Tireûs d’Seuris");
        $club->setAcronym("BTS");
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $club->setEmail('bts@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Dinant Archery Team");
        $club->setAcronym("DAT");
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $club->setEmail('dinantarcheryteam@outlook.com');
        $manager->persist($club);

        /*--------------------------------------*/

        $club = new Club();
        $club->setName("Royal Archery Club Grivegnée");
        $club->setAcronym("ACG");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('acg@lfbta.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_ACG, $club);

        $club = new Club();
        $club->setName("Compagnie des Archers de Huy");
        $club->setAcronym("HUY");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('huy@lfbta.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_HUY, $club);

        $club = new Club();
        $club->setName("Compagnie Royale d’Archers Liège");
        $club->setAcronym("LIE");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('lie@lfbta.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_LIE, $club);

        $club = new Club();
        $club->setName("Confrérie des Archers Spadois");
        $club->setAcronym("CAS");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('cas@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers de l’Ordre du Chuffin");
        $club->setAcronym("CTH");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('contact@archers-chuffin.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Coq Mosan Oupeye");
        $club->setAcronym("ACM");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('acm@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers de Seraing");
        $club->setAcronym("ADS");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('ads@lfbta.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_ADS, $club);

        $club = new Club();
        $club->setName("Intertir Welkenraedt");
        $club->setAcronym("ITW");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('saphir1963@hotmail.com');
        // $club->setOwner($this->getReference(ArcherFixtures::ARCHER_LP));
        $club->setWebsite('http://whitebear.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_ITW, $club);

        $club = new Club();
        $club->setName("Les Archers du Val de Blegny");
        $club->setAcronym("AVB");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('avb@lfbta.be');
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archery Club de Malmedy");
        $club->setAcronym("MDY");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('mdy@lfbta.be');
        $manager->persist($club);

        $this->addReference(self::CLUB_MDY, $club);

        $club = new Club();
        $club->setName("Dree Schteng Archery Club Plombières");
        $club->setAcronym("DSA");
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $club->setEmail('dreeschtengarcheryclub@gmail.com');
        $manager->persist($club);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            RegionFixtures::class
        );
    }
}
