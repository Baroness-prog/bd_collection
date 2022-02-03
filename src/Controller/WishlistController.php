<?php

namespace App\Controller;


use App\Entity\Wishlist;
use App\Form\WhishlistType;
use App\Repository\WishlistRepository;
use App\service\OpenlibrarySelector;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/wishlist", name="wishlist_")
 */
class WishlistController extends AbstractController
{
    /**
     * @Route("/show", name="show")
     */
    public function index(WishlistRepository $wishlistRepository): Response
    {
        $wishlist = $wishlistRepository->findAll();
        return $this->render('wishlist/index.html.twig', [
            'controller_name' => 'WishlistController',
            'wishlists' => $wishlist,
        ]);
    }

    /**
     * @Route("/add", name="add")
     */
    public function createWishList(
        Request $request,
        ManagerRegistry $managerRegistry,
        OpenlibrarySelector $openlibrarySelector
    )
    {


        $entityManager = $managerRegistry->getManager();
        $wishlist= new Wishlist();
        $form = $this->createForm(WhishlistType::class, $wishlist);
        $form->handleRequest($request);
        $this->redirectToRoute('wishlist_add');
        if ($form->isSubmitted() && $form->isValid()) {
            $title = $openlibrarySelector->getData($wishlist->getTitle());
            $wishlist->setTitle($title);
            $entityManager->persist($wishlist);
            $entityManager->flush();
            return $this->redirectToRoute('wishlist_show');
        }
        return $this->render('wishlist/create_wishlist.html.twig', [
            "form" => $form->createView(),
        ]);
    }
}
