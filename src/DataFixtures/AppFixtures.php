<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++) {
            $event = new Event();
            $event->setName(Factory::create()->sentence(6));
            $event->setDate(Factory::create()->dateTimeThisYear());
            $event->setLatitude(Factory::create()->latitude());
            $event->setLongitude(Factory::create()->longitude());
            $manager->persist($event);
        }

        $manager->flush();
    }
}
