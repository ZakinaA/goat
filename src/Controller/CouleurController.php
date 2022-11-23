<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Couleur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CouleurType;

class CouleurController extends AbstractController
{
    #[Route('/couleur', name: 'app_couleur')]
    public function index(): Response
    {
        return $this->render('couleur/index.html.twig', [
            'controller_name' => 'couleurController',
        ]);
    }
    
    public function consulterCouleur(ManagerRegistry $doctrine, int $id){

        $couleur= $doctrine->getRepository(Couleur::class)->find($id);
    
        if (!$couleur) {
            throw $this->createNotFoundException(
            'Aucun couleur trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('Couleur : '.$Couleur->getNom());
        return $this->render('couleur/consulter.html.twig', [
            'couleur' => $couleur,]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Couleur::class);

    $couleurs= $repository->findAll();
    return $this->render('couleur/lister.html.twig', [
    'pcouleurs' => $couleurs,]);	
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request){
        $couleur = new couleur();
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $couleur = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($couleur);
                $entityManager->flush();
     
            return $this->render('couleur/consulter.html.twig', ['couleur' => $couleur,]);
        }
        else
            {
                return $this->render('couleur/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
}
