<?php

namespace App\DataFixtures;

use App\Entity\wishlistColec;
use App\Entity\Genres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Wishlist extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $wishlists = [
            ['title' => 'Blacksad',
                'Tome' => '1',
                'image' => 'https://wishlisti.dlpdomain.com/album/9782205049657-couv.jpg',
                'genres' => 'Aventure'],
            ['title' => 'Blacksad : artic-nation',
                'Tome' => '2',
                'image' => 'https://wishlisti.dlpdomain.com/album/9782205051995-couv.jpg',
                'genres' => 'Aventure'],
            ['title' => 'OKKO : cycle du vent',
                'Tome' => '1',
                'image' => 'https://www.bedetheque.com/media/Couvertures/Couv_41693.jpg',
                'genres' => 'Aventure'],
            ['title' => 'OKKO : cycle du vent',
                'Tome' => '2',
                'image' => 'https://static.fnac-static.com/multimedia/Images/FR/NR/ce/13/1b/1774542/1507-1/tsp20200429070933/Okko-T02-Le-cycle-de-l-eau-2.jpg',
                'genres' => 'Aventure']];


        foreach ($wishlists as $wishlist) {
            $wish = new \App\Entity\Wishlist();
            $genre = new Genres();
            $wish->setTitle($wishlist['title']);
            $wish->setTome($wishlist['Tome']);
            $wish->setImage($wishlist['image']);
            $manager->persist($wish);
        }
        $manager->flush();

    }

}
