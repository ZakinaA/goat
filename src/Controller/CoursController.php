<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cours;
use App\Form\CoursType;

class CoursController extends AbstractController
{
    #[Route('/cours', name: 'app_cours')]
    public function index(): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'CoursController',
        ]);
    }
    public function listerCours(ManagerRegistry $doctrine){
        $repository = $doctrine->getRepository(Cours::class);

        $cours = $repository->findAll();

        return $this->render('cours/lister.html.twig', [
            'pCours' => $cours,]);	
    }
public function consulterCours(ManagerRegistry $doctrine,$id){
		
        $cours = $doctrine->getRepository(Cours::class)->find($id);
    
        if (!$cours) {
            throw $this->createNotFoundException(
            'Aucun cours trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('cours : '.$cours->getNom());
        return $this->render('cours/consulter.html.twig', [
            'cours' => $cours,]);
    }
public function ajouter(ManagerRegistry $doctrine, Request $request){
        $cours = new cours();
        $form = $this->createForm(CoursType::class, $cours);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $cours = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($cours);
                $entityManager->flush();
     
            return $this->render('cours/consulter.html.twig', ['cours' => $cours,]);
        }
        else
            {
                return $this->render('cours/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
    public function modifierCours(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération de l'élève dont l'id est passé en paramètre
        $cours = $doctrine->getRepository(Cours::class)->find($id);
     
        if (!$cours) {
            throw $this->createNotFoundException('Aucun cours trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(CoursModifierType::class, $cours);
                $form->handleRequest($request);
     
                if ($form->isSubmitted() && $form->isValid()) {
     
                     $cours = $form->getData();
                     $entityManager = $doctrine->getManager();
                     $entityManager->persist($cours);
                     $entityManager->flush();
                     return $this->render('cours/consulter.html.twig', ['cours' => $cours,]);
               }
               else{
                    return $this->render('cours/ajouter.html.twig', array('form' => $form->createView(),));
               }
            }
     }
}
