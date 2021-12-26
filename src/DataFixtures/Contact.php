<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contact =new \App\Entity\Contact();
        $contact1 =new \App\Entity\Contact();


        $contact1 ->setName('Michel');
        $contact1 ->setFirstName('Dupont');
        $contact1 ->setAge(69);
        $contact1 ->setNewsletter(false);

        $manager->persist($contact1);
        $manager->flush();

        $contact ->setName('Caroline');
        $contact ->setFirstName('Martinez');
        $contact ->setAge(96);
        $contact ->setNewsletter(true);

        $manager->persist($contact);
        $manager->flush();
    }
}
