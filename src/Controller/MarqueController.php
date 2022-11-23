<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Marque;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\MarqueType;

class MarqueController extends AbstractController
{
    #[Route('/marque', name: 'app_marque')]
    public function index(): Response
    {
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'marqueController',
        ]);
    }
    
    public function consulterMarque(ManagerRegistry $doctrine, int $id){

        $marque= $doctrine->getRepository(Marque::class)->find($id);
    
        if (!$marque) {
            throw $this->createNotFoundException(
            'Aucun marque trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('Marque : '.$Marque->getNom());
        return $this->render('marque/consulter.html.twig', [
            'marque' => $marque,]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Marque::class);

    $marques= $repository->findAll();
    return $this->render('marque/lister.html.twig', [
    'pmarques' => $marques,]);	
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request){
        $marque = new marque();
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $marque = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($marque);
                $entityManager->flush();
     
            return $this->render('marque/consulter.html.twig', ['marque' => $marque,]);
        }
        else
            {
                return $this->render('marque/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
}
