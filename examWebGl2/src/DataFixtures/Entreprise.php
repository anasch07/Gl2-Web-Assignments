<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Entreprise extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            "Huawei",
            "bmw",
            "Apple",
            "Audi",
            "Google",
            "Microsoft",
            "Amazon",
            "Facebook",
            "Twitter"
        ];
        for ($i=0; $i<count($data);$i++) {
            $entreprise = new \App\Entity\Entreprise();
            $entreprise->setDesignation($data[$i]);
            $manager->persist($entreprise);
        }
        $manager->flush();
    }
}
