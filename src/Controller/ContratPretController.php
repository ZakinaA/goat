<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ContratPret;
use App\Form\ContratPretType;

class ContratPretController extends AbstractController
{
    #[Route('/contrat/pret', name: 'app_contrat_pret')]
    public function index(): Response
    {
        return $this->render('contrat_pret/index.html.twig', [
            'controller_name' => 'ContratPretController',
        ]);
    }

    public function consulterContratPret(ManagerRegistry $doctrine, int $id){

        $contratPret= $doctrine->getRepository(ContratPret::class)->find($id);
    
        if (!$contratPret) {
            throw $this->createNotFoundException(
            'Aucun contratPret trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('ContratPret : '.$ContratPret->getNom());
        return $this->render('contrat_pret/consulter.html.twig', [
            'contratPret' => $contratPret,]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(ContratPret::class);

    $contratPrets= $repository->findAll();
    return $this->render('contrat_pret/lister.html.twig', [
    'pcontratPrets' => $contratPrets,]);	
    }


 public function ajouter(ManagerRegistry $doctrine, Request $request){
        $contratPrets = new ContratPret();
        $form = $this->createForm(ContratPretType::class, $contratPrets);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $contratPrets = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($contratPrets);
                $entityManager->flush();
     
            return $this->redirectToRoute('route_accueil');
        }
        else
            {
                return $this->render('contrat_pret/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }

}