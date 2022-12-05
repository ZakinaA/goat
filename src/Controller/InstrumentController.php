<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Instrument;
use App\Form\InstrumentType;
use App\Entity\TypeInstrument;
use App\Form\InstrumentModifierType;
use App\Form\InstrumentSupprimerType;

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

    public function consulterTypeInstrument(ManagerRegistry $doctrine, int $id){
		

        $typeInstrument = $doctrine->getRepository(typeInstrument::class)->find($id);
        /*echo ($typeInstrument->getLibelle());

        foreach ($typeInstrument->$getInstruments() as $instru){
            echo ($instru->getNom());
        }*/
  

        /*var_dump($typeInstrument);*/

        if (!$typeInstrument) {
            throw $this->createNotFoundException(
            'Aucun instrument trouvé avec le numéro '.$id
            );
        }
    
        return $this->render('instrument/consulterType.html.twig', [
            'typeInstrument' => $typeInstrument]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Instrument::class);

    $instruments= $repository->findAll();
    return $this->render('instrument/lister.html.twig', [
    'pinstruments' => $instruments,]);	
    }

    public function listerType(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(TypeInstrument::class);

    $instruments= $repository->findAll();
    return $this->render('instrument/listerType.html.twig', [
    'pinstruments' => $instruments,]);	
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request){
        $instrument = new instrument();
        $form = $this->createForm(InstrumentType::class, $instrument);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $instrument = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($instrument);
                $entityManager->flush();
     
            return $this->render('instrument/consulter.html.twig', ['instrument' => $instrument,]);
        }
        else
            {
                return $this->render('instrument/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }

    public function modifierInstrument(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération de l'élève dont l'id est passé en paramètre
        $instrument = $doctrine->getRepository(Instrument::class)->find($id);
    
        if (!$instrument) {
            throw $this->createNotFoundException('Aucun instrument trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(InstrumentModifierType::class, $instrument);
                $form->handleRequest($request);
    
                if ($form->isSubmitted() && $form->isValid()) {
    
                    $instrument = $form->getData();
                    $entityManager = $doctrine->getManager();
                    $entityManager->persist($instrument);
                    $entityManager->flush();
                    return $this->render('instrument/consulter.html.twig', ['instrument' => $instrument,]);
            }
            else{
                    return $this->render('instrument/ajouter.html.twig', array('form' => $form->createView(),));
            }
        }
        }
        public function supprimerInstrument(ManagerRegistry $doctrine, $id, Request $request){
 
            //récupération de l'élève dont l'id est passé en paramètre
            $instrument = $doctrine->getRepository(Instrument::class)->find($id);
        
            if (!$instrument) {
                throw $this->createNotFoundException('Aucun instrument trouvé avec le numéro '.$id);
            }
            else
            {
                    $form = $this->createForm(InstrumentSupprimerType::class, $instrument);
                    $form->handleRequest($request);
        
                    if ($form->isSubmitted() && $form->isValid()) {
        
                        $entityManager = $doctrine->getManager();
                        $entityManager ->remove($instrument);
                        $entityManager->flush();
                        $repository = $doctrine->getRepository(Instrument::class);
                        $instruments = $repository->findAll();
                        return $this->render('instrument/lister.html.twig', [
                            'pInstruments' => $instruments,]);	
                }
                else{
                        return $this->render('instrument/ajouter.html.twig', array('form' => $form->createView(),));
                }
            }
        }

        public function show(Instrument $uninstrument)
	{
 
		return $this->render('instrument/consulter.html.twig', [
            'instrument' => $unInstrument,]);
	}
}
