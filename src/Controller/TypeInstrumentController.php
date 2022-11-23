<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeInstrument;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\TypeInstrumentType;

class TypeInstrumentController extends AbstractController
{
    #[Route('/type_instrument', name: 'app_type_instrument')]
    public function index(): Response
    {
        return $this->render('type_instrument/index.html.twig', [
            'controller_name' => 'typeInstrumentController',
        ]);
    }
    
    public function consulterTypeInstrument(ManagerRegistry $doctrine, int $id){

        $typeInstrument= $doctrine->getRepository(TypeInstrument::class)->find($id);
    
        if (!$typeInstrument) {
            throw $this->createNotFoundException(
            'Aucun typeInstrument trouvé avec le numéro '.$id
            );
        }
    
        //return new Response('TypeInstrument : '.$TypeInstrument->getNom());
        return $this->render('type_instrument/consulter.html.twig', [
            'typeInstrument' => $typeInstrument,]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(TypeInstrument::class);

    $typeInstruments= $repository->findAll();
    return $this->render('type_instrument/lister.html.twig', [
    'ptypeInstruments' => $typeInstruments,]);	
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request){
        $typeInstrument = new typeInstrument();
        $form = $this->createForm(TypeInstrumentType::class, $typeInstrument);
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
     
                $typeInstrument = $form->getData();
    
    
                $entityManager = $doctrine->getManager();
                $entityManager->persist($typeInstrument);
                $entityManager->flush();
     
            return $this->render('type_instrument/consulter.html.twig', ['typeInstrument' => $typeInstrument,]);
        }
        else
            {
                return $this->render('type_instrument/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }
}
