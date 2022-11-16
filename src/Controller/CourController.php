<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cour;
use App\Form\CourType;
use App\Form\CourModifierType;
class CourController extends AbstractController
{
    #[Route('/cour', name: 'app_cour')]
    public function index(): Response
    {
        return $this->render('cour/index.html.twig', [
            'controller_name' => 'CourController',
        ]);
    }
    public function listerCour(ManagerRegistry $doctrine){
        $repository = $doctrine->getRepository(Cour::class);

        $cours = $repository->findAll();

        return $this->render('cour/lister.html.twig', [
            'pCours' => $cours,]);	
    }
public function consulterCour(ManagerRegistry $doctrine,$id){
		
        $cour = $doctrine->getRepository(Cour::class)->find($id);
    
        if (!$cour) {
            throw $this->createNotFoundException(
            'Aucun cour trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('cour : '.$cour->getNom());
        return $this->render('cour/consulter.html.twig', [
            'cour' => $cour,]);
    }
public function ajouter(ManagerRegistry $doctrine, Request $request){
        $cour = new cour();
        $form = $this->createForm(CourType::class, $cour);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $cour = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($cour);
                $entityManager->flush();
     
            return $this->render('cour/consulter.html.twig', ['cour' => $cour,]);
        }
        else
            {
                return $this->render('cour/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
    public function modifierCour(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération de l'élève dont l'id est passé en paramètre
        $cour = $doctrine->getRepository(Cour::class)->find($id);
     
        if (!$cour) {
            throw $this->createNotFoundException('Aucun cour trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(CourModifierType::class, $cour);
                $form->handleRequest($request);
     
                if ($form->isSubmitted() && $form->isValid()) {
     
                     $cour = $form->getData();
                     $entityManager = $doctrine->getManager();
                     $entityManager->persist($cour);
                     $entityManager->flush();
                     return $this->render('cour/consulter.html.twig', ['cour' => $cour,]);
               }
               else{
                    return $this->render('cour/ajouter.html.twig', array('form' => $form->createView(),));
               }
            }
     }

}
