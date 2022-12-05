<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Professeur;
use App\Form\ProfesseurType;
use App\Form\ProfesseurModifierType;
use App\Form\ProfesseurSupprimerType;

class ProfesseurController extends AbstractController
{
    #[Route('/professeur', name: 'app_professeur')]
    public function index(): Response
    {
        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
        ]);
    }
    public function consulterProfesseur(ManagerRegistry $doctrine, int $id){
		
		$professeur= $doctrine->getRepository(Professeur::class)->find($id);
		if (!$professeur) {
			throw $this->createNotFoundException(
            'Aucun professeur n a trouvé avec le numéro '.$id
			);
		}

		//return new Response('Professeur : '.$professeur->getNom());
		return $this->render('professeur/consulter.html.twig', [
            'professeur' => $professeur,]);
	}

    public function listerProfesseur(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Professeur::class);
		
		$professeurs= $repository->findAll();
		return $this->render('professeur/lister.html.twig', [
            'pProfesseurs' => $professeurs,]);	
			
	}

	public function ajouterProfesseur(Request $request,ManagerRegistry $doctrine){
        $professeur = new professeur();
	$form = $this->createForm(ProfesseurType::class, $professeur);
	$form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $professeur = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($professeur);
            $entityManager->flush();
 
	    
            return $this->redirectToRoute('app_register');
	}
	else
        {
            return $this->render('professeur/ajouter.html.twig', array('form' => $form->createView(),));
	}
}
public function modifierProfesseur(ManagerRegistry $doctrine, $id, Request $request){
 
    //récupération de l'élève dont l'id est passé en paramètre
    $professeur = $doctrine->getRepository(Professeur::class)->find($id);

    if (!$professeur) {
        throw $this->createNotFoundException('Aucun professeur trouvé avec le numéro '.$id);
    }
    else
    {
            $form = $this->createForm(ProfesseurModifierType::class, $professeur);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $professeur = $form->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($professeur);
                $entityManager->flush();
                return $this->render('professeur/consulter.html.twig', ['professeur' => $professeur,]);
        }
        else{
                return $this->render('professeur/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
    }
    public function supprimerProfesseur(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération de l'élève dont l'id est passé en paramètre
        $professeur = $doctrine->getRepository(Professeur::class)->find($id);
    
        if (!$professeur) {
            throw $this->createNotFoundException('Aucun eleve trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(ProfesseurSupprimerType::class, $professeur);
                $form->handleRequest($request);
    
                if ($form->isSubmitted() && $form->isValid()) {
    
                    $entityManager = $doctrine->getManager();
                    $entityManager ->remove($professeur);
                    $entityManager->flush();
                    $repository = $doctrine->getRepository(Professeur::class);
                    $professeurs = $repository->findAll();
                    return $this->render('professeur/lister.html.twig', [
                        'pProfesseurs' => $professeurs,]);	
            }
            else{
                    return $this->render('professeur/ajouter.html.twig', array('form' => $form->createView(),));
            }
        }
    }
}
