<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Eleve;
use App\Form\EleveType;
use App\Form\EleveModifierType;
use App\Form\EleveSupprimerType;

class EleveController extends AbstractController
{
    #[Route('/eleve', name: 'app_eleve')]
    public function index(): Response
    {
        return $this->render('eleve/index.html.twig', [
            'controller_name' => 'EleveController',
        ]);
    }
    public function listerEleve(ManagerRegistry $doctrine){
        $repository = $doctrine->getRepository(Eleve::class);

        $eleves = $repository->findAll();

        return $this->render('eleve/lister.html.twig', [
            'pEleves' => $eleves,]);	
    }
    public function consulterEleve(ManagerRegistry $doctrine,$id){
		
        $eleve = $doctrine->getRepository(Eleve::class)->find($id);
    
        if (!$eleve) {
            throw $this->createNotFoundException(
            'Aucun eleve trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('eleve : '.$eleve->getNom());
        return $this->render('eleve/consulter.html.twig', [
            'eleve' => $eleve,]);
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request){
    $eleve = new eleve();
	$form = $this->createForm(EleveType::class, $eleve);
    
	$form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $eleve = $form->getData();


            $entityManager = $doctrine->getManager();
            $entityManager->persist($eleve);
            $entityManager->flush();
 
            return $this->redirectToRoute('app_register');
	}
	else
        {
            return $this->render('eleve/ajouter.html.twig', array('form' => $form->createView(),));
	}
}
    public function modifierEleve(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération de l'élève dont l'id est passé en paramètre
        $eleve = $doctrine->getRepository(Eleve::class)->find($id);
    
        if (!$eleve) {
            throw $this->createNotFoundException('Aucun eleve trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(EleveModifierType::class, $eleve);
                $form->handleRequest($request);
    
                if ($form->isSubmitted() && $form->isValid()) {
    
                    $eleve = $form->getData();
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($eleve);
                    $entityManager->flush();
                    return $this->render('eleve/consulter.html.twig', ['eleve' => $eleve,]);
            }
            else{
                    return $this->render('eleve/ajouter.html.twig', array('form' => $form->createView(),));
            }
        }
        }
        public function supprimerEleve(ManagerRegistry $doctrine, $id, Request $request){
 
            //récupération de l'élève dont l'id est passé en paramètre
            $eleve = $doctrine->getRepository(Eleve::class)->find($id);
        
            if (!$eleve) {
                throw $this->createNotFoundException('Aucun eleve trouvé avec le numéro '.$id);
            }
            else
            {
                    $form = $this->createForm(EleveSupprimerType::class, $eleve);
                    $form->handleRequest($request);
        
                    if ($form->isSubmitted() && $form->isValid()) {
        
                        $entityManager = $doctrine->getManager();
                        $entityManager ->remove($eleve);
                        $entityManager->flush();
                        $repository = $doctrine->getRepository(Eleve::class);
                        $eleves = $repository->findAll();
                        return $this->render('eleve/lister.html.twig', [
                            'pEleves' => $eleves,]);	
                }
                else{
                        return $this->render('eleve/ajouter.html.twig', array('form' => $form->createView(),));
                }
            }
        }
}
