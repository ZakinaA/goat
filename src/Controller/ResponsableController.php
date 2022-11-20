<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Responsable;



class ResponsableController extends AbstractController
{
    #[Route('/responsable', name: 'app_responsable')]
    public function index(): Response
    {
        return $this->render('responsable/index.html.twig', [
            'controller_name' => 'ResponsableController',
        ]);
    }
    public function listerResponsable(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Responsable::class);
    
        $responsables = $repository->findAll();
    
        return $this->render('responsable/lister.html.twig', [
            'pResponsables' => $responsables,]);	
    }


    public function consulterResponsable(ManagerRegistry $doctrine, int $id){

		$responsable= $doctrine->getRepository(Responsable::class)->find($id);

		if (!$responsable) {
			throw $this->createNotFoundException(
            'Aucun responsable trouvé avec le numéro '.$id
			);
		}

		//return new Response('Etudiant : '.$etudiant->getNom());
		return $this->render('responsable/consulter.html.twig', [
            'responsable' => $responsable,]);
	}
}
