<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Accessoire;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AccessoireType;

class AccessoireController extends AbstractController
{
    #[Route('/accessoire', name: 'app_accessoire')]
    public function index(): Response
    {
        return $this->render('accessoire/index.html.twig', [
            'controller_name' => 'AccessoireController',
        ]);
    }
    
    public function consulterAccessoire(ManagerRegistry $doctrine, int $id){

        $accessoire= $doctrine->getRepository(Accessoire::class)->find($id);
    
        if (!$accessoire) {
            throw $this->createNotFoundException(
            'Aucun accessoire trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('Accessoire : '.$Accessoire->getNom());
        return $this->render('accessoire/consulter.html.twig', [
            'accessoire' => $accessoire,]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Accessoire::class);

    $accessoires= $repository->findAll();
    return $this->render('accessoire/lister.html.twig', [
    'paccessoires' => $accessoires,]);	
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request){
        $accessoire = new accessoire();
        $form = $this->createForm(AccessoireType::class, $accessoire);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $accessoire = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($accessoire);
                $entityManager->flush();
     
            return $this->render('accessoire/consulter.html.twig', ['accessoire' => $accessoire,]);
        }
        else
            {
                return $this->render('accessoire/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
}
