<?php

namespace App\DataFixtures;

use App\Entity\BdColec;
use App\Entity\Genres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Bd extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bds = [
            ['title' => 'Blacksad',
                'edition' => 'Dargaux',
                'Tome' => '1',
                'image' => 'https://bdi.dlpdomain.com/album/9782205049657-couv.jpg',
                'genres_id' => 9],
            ['title' => 'Blacksad : artic-nation',
                'edition' => 'Dargaux',
                'Tome' => '2',
                'image' => 'https://bdi.dlpdomain.com/album/9782205051995-couv.jpg',
                'genres_id' => 9],
            ['title' => 'OKKO : cycle du vent',
                'edition' => 'Delcourt',
                'Tome' => '1',
                'image' => 'https://www.bedetheque.com/media/Couvertures/Couv_41693.jpg',
                'genres_id' => 9],
            ['title' => 'OKKO : cycle du vent',
                'edition' => 'Delcourt',
                'Tome' => '2',
                'image' => 'https://static.fnac-static.com/multimedia/Images/FR/NR/ce/13/1b/1774542/1507-1/tsp20200429070933/Okko-T02-Le-cycle-de-l-eau-2.jpg',
                'genres_id' => 9]];


        foreach ($bds as $bd) {
            $bdT = new BdColec();
            $genre = new Genres();
            $bdT->setTitle($bd['title']);
            $bdT->setEdition($bd['edition']);
            $bdT->setTome($bd['Tome']);
            $bdT->setImage($bd['image']);
            $manager->persist($bdT);
        }
        $manager->flush();

    }
}
