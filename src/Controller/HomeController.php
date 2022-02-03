<?php

namespace App\Controller;

use App\Entity\BdColec;
use App\Entity\Wishlist;
use App\Repository\BdColecRepository;
use App\Repository\WishlistRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(BdColecRepository $bdColecRepository, WishlistRepository $wishlistRepository): Response
    {
        $bdColecs = $bdColecRepository->findAll();
        $wishlists = $wishlistRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'bdcolecs' => $bdColecs,
            'wishlists' => $wishlists,
        ]);
    }
}
