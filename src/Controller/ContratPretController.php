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

    public function ajouter(ManagerRegistry $doctrine, Request $request, int $id){

        $contratPret= $doctrine->getRepository(ContratPret::class)->find($id);
        if (!$contratPret) {
            throw $this->createNotFoundException('Aucun contrat de pret trouvé avec le numéro '.$id);
        }
        else
        {
            $form = $this->createForm(ContratPretType::class, $contratPret);
            $form->handleRequest($request);
     
                if ($form->isSubmitted() && $form->isValid()) {
     
                    $contratPret = $form->getData();
    
    
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($ContratPret);
                    $entityManager->flush();
     
                return $this->render('contrat_pret/consulter.html.twig', ['ContratPret' => $ContratPret,]);
        }
        else
            {
                return $this->render('contrat_pret/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
}
}