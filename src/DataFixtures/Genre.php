<?php

namespace App\DataFixtures;

use App\Entity\Genres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Genre extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $genres = [
            ['name'=> 'Aventure'],
            ['name'=> 'Western'],
            ['name'=> 'Fantaisie'],
            ['name'=> 'Humour'],
            ['name'=> 'Science-fiction'],
            ['name'=> 'Historique'],
            ['name'=> 'Autres']];


        foreach ($genres as $genre) {
            $genr = new Genres();
            $genr->setName($genre['name']);
            $manager->persist($genr);
        }
        $manager->flush();

    }
}
