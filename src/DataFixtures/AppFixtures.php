<?php

namespace App\DataFixtures;

use App\Entity\Survey;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $survey = new Survey();
        $survey->setTitle('Fotografen-AG');
        $manager->persist($survey);

        $manager->flush();
    }
}
