<?php

namespace App\DataFixtures;

use App\Entity\ArcherCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArcherCategoryFixtures extends Fixture
{
    private const SEXES = ["Men", "Women"];
    private const ARCS = ["Recurve", "Compound", "Barebow"];
    private const CATEGORIES = ["U13", "U15", "U18", "U21", "", "50+", "60+"];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $cat) {
            foreach (self::SEXES as $sexe) {
                foreach (self::ARCS as $arc) {
                    $category = new ArcherCategory();
                    $name = trim($arc . ' ' . $sexe . ' ' . $cat);
                    $category->setName($name);
                    $category->setMinimumAge(0);
                    $category->setArc(strtolower($arc));

                    if ($cat === null) {
                        $category->setAcronym(substr($arc, 0, 1) . substr($sexe, 0, 1));
                    } else {
                        $category->setAcronym(substr($arc, 0, 1) . $cat . substr($sexe, 0, 1));
                    }

                    $manager->persist($category);

                    $this->addReference('cat-' . $category->getAcronym(), $category);
                }
            }
        }

        $category = new ArcherCategory();
        $category->setName('Longbow Mixte Junior');
        $category->setMinimumAge(0);
        $category->setAcronym('LMJ');
        $category->setArc(ArcherCategory::ARC_LONGBOW);
        $manager->persist($category);

        $category = new ArcherCategory();
        $category->setName('Longbow Mixte Senior');
        $category->setMinimumAge(0);
        $category->setAcronym('LMS');
        $category->setArc(ArcherCategory::ARC_LONGBOW);
        $manager->persist($category);

        $category = new ArcherCategory();
        $category->setName('Longbow Mixte 50+');
        $category->setMinimumAge(0);
        $category->setAcronym('LM50');
        $category->setArc(ArcherCategory::ARC_LONGBOW);
        $manager->persist($category);

        $manager->flush();
    }
}
