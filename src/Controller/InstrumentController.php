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
        return $this->render('instrument/index.html.twig', [
            'controller_name' => 'InstrumentController',
        ]);
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
