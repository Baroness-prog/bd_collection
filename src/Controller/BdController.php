<?php

namespace App\Controller;

use App\Entity\BdColec;
use App\Entity\Genres;
use App\Form\AddBdCollectionType;
use App\Repository\BdColecRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bd", name="bd_")
 */

class BdController extends AbstractController
{
    /**
     * @Route("/collection", name="collection")
     */
    public function index(BdColecRepository $bdColecRepository): Response
    {
        $bdCollection= $bdColecRepository->findAll();
        return $this->render('bd/index.html.twig', [
            "bdCollections" => $bdCollection,
        ]);
    }
/**
 * @Route ("/addBd", name="add")
 */
    public function addBdCollection(\Symfony\Component\HttpFoundation\Request $request)
    {
        $bdCollection = new BdColec();
        $form = $this->createForm(AddBdCollectionType::class,$bdCollection);
        $form->handleRequest($request);
        $this->redirectToRoute('bd_add');
        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($bdCollection);
            $entityManager->flush();
            $this->addFlash('success', 'Votre BD a bien été ajoutée');

            return $this->redirectToRoute('bd_collection');
        }
        return $this->render('bd/add_bd.html.twig', [
            "form" => $form->createView(),
        ]);
    }

 /**
  * @Route ("/genre/{genres}" , name="genre" )
  */
    public function BdByGenres (
        ManagerRegistry $managerRegistry,
        BdColecRepository $bdColecRepository,
        Request $request,
        Genres $genres)
    {
        $bdColecRepository=$managerRegistry->getRepository(BdColec::class);
        $genres = $managerRegistry->getRepository(Genres::class);
        $genres = $request->get('name') ? $request->get('name') : '' ;
        $bds = [];
        if ($genres) {
            $bds = $bdColecRepository->findBy(['genre', $genres]);
        }
        return $this->render('bd/genre.html.twig',[
            'bds'=> $bds,
            'genres' => $managerRegistry->findAll()
        ]);
    }
}
