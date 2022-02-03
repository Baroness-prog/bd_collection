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
                'genres' => 'Aventure'],
            ['title' => 'Blacksad : artic-nation',
                'edition' => 'Dargaux',
                'Tome' => '2',
                'image' => 'https://bdi.dlpdomain.com/album/9782205051995-couv.jpg',
                'genres' => 'Aventure']];


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
