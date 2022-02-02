<?php

namespace App\Controller;

use App\Entity\BdColec;
use App\Form\AddBdCollectionType;
use App\Repository\BdColecRepository;
use App\Repository\BdCollectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
