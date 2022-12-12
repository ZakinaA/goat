<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Intervention;
use App\Entity\Instrument;
use App\Form\InterventionType;
use App\Form\InterventionModifierType;
use App\Form\InterventionSupprimerType;



class InterventionController extends AbstractController
{
    #[Route('/intervention', name: 'app_intervention')]
    public function index(): Response
    {
        return $this->render('intervention/index.html.twig', [
            'controller_name' => 'InterventionController',
        ]);
    }

    public function consulterIntervention(ManagerRegistry $doctrine, int $id){

        $intervention= $doctrine->getRepository(Instrument::class)->find($id);
    
        if (!$intervention) {
            throw $this->createNotFoundException(
            'Aucun intervention trouvé avec le numéro '.$id
            );
        }
        else{
    
        //return new Response('Instrument : '.$Instrument->getNom());
        return $this->render('intervention/consulter.html.twig', [
            'intervention' => $intervention,]);
        } 

        
    }

    public function ajouterIntervention(ManagerRegistry $doctrine, Request $request){
        $intervention = new intervention();
        $form = $this->createForm(InterventionType::class, $intervention);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $intervention = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($intervention);
                $entityManager->flush();
     
            return $this->render('intervention/consulter.html.twig', ['intervention' => $intervention,]);
        }
        else
            {
                return $this->render('intervention/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }

        public function lister(ManagerRegistry $doctrine){

            $repository = $doctrine->getRepository(Intervention::class);

        $interventions= $repository->findAll();
        return $this->render('intervention/lister.html.twig', [
        'pinterventions' => $interventions,]);	
        }

        public function modifier(ManagerRegistry $doctrine, $id, Request $request){
 
            //récupération de l'élève dont l'id est passé en paramètre
            $intervention = $doctrine->getRepository(Intervention::class)->find($id);
        
            if (!$intervention) {
                throw $this->createNotFoundException('Aucun eleve trouvé avec le numéro '.$id);
            }
            else
            {
                    $form = $this->createForm(InterventionModifierType::class, $intervention);
                    $form->handleRequest($request);
        
                    if ($form->isSubmitted() && $form->isValid()) {
        
                        $intervention = $form->getData();
                        $entityManager = $doctrine->getManager();
                        $entityManager->persist($intervention);
                        $entityManager->flush();
                        return $this->render('intervention/consulter.html.twig', ['intervention' => $intervention,]);
                }
                else{
                        return $this->render('intervention/ajouter.html.twig', array('form' => $form->createView(),));
                }
            }

        
        }

        public function supprimer(ManagerRegistry $doctrine, $id, Request $request){
 
            //récupération de l'élève dont l'id est passé en paramètre
            $intervention = $doctrine->getRepository(Eleve::class)->find($id);
        
            if (!$intervention) {
                throw $this->createNotFoundException('Aucun eleve trouvé avec le numéro '.$id);
            }
            else
            {
                    $form = $this->createForm(InterventionSupprimerType::class, $eleve);
                    $form->handleRequest($request);
        
                    if ($form->isSubmitted() && $form->isValid()) {
        
                        $entityManager = $doctrine->getManager();
                        $entityManager ->remove($eleve);
                        $entityManager->flush();
                        $repository = $doctrine->getRepository(Intervention::class);
                        $interventions = $repository->findAll();
                        return $this->render('intervention/lister.html.twig', [
                            'pInterventions' => $interventions,]);	
                }
                else{
                        return $this->render('intervention/ajouter.html.twig', array('form' => $form->createView(),));
                }
            }
        }


}