<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Instrument;
use Doctrine\Persistence\ManagerRegistry;

class InstrumentController extends AbstractController
{
    #[Route('/instrument', name: 'app_instrument')]
    public function index(): Response
    {
         return $this->render('instrument/accueil.html.twig', [ ]);				         
    }

    public function ajouter(ManagerRegistry $doctrine){
		
        // récupère le manager d'entités
            $entityManager = $doctrine->getManager();
    
            // instanciation d'un objet instrument
            $instrument = new instrument();
            $instrument->setNom('Batterie');
            $instrument->setClasseInstrument('Instrument Samplifiés');
            $instrument->setDateAchat('2011-06-06');
            $instrument->setPrix('Batterie');
            $instrument->setMarque('Batterie');
            $instrument->setModele('Batterie');
            $instrument->setNumeroSerie('Batterie');
            $instrument->setCouleur('Batterie');
            $instrument->setUtilisation('Batterie');
    
            // Indique à Doctrine de persister l'objet
            $entityManager->persist($instrument);
    
            // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
            $entityManager->flush();
    
            // renvoie vers la vue de consultation de l'instrument en passant l'objet instrument en paramètre
           return $this->render('instrument/consulter.html.twig', [
                'instrument' => $instrument,]);
            
        }
    
    public function consulterInstrument(ManagerRegistry $doctrine, int $id){

        $instrument= $doctrine->getRepository(Instrument::class)->find($id);
    
        if (!$instrument) {
            throw $this->createNotFoundException(
            'Aucun instrument trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('Instrument : '.$Instrument->getNom());
        return $this->render('instrument/consulter.html.twig', [
            'instrument' => $instrument,]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Instrument::class);

    $instruments= $repository->findAll();
    return $this->render('instrument/lister.html.twig', [
    'pinstruments' => $instruments,]);	
    }

}
