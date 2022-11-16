<?php
 
namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Professeur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

 
class ProfesseurController extends AbstractController
{


public function consulterProfesseur(ManagerRegistry $doctrine, int $id){
		
		$professeur= $doctrine->getRepository(Professeur::class)->find($id);
		if (!$professeur) {
			throw $this->createNotFoundException(
            'Aucun professeur n a trouvé avec le numéro '.$id
			);
		}

		//return new Response('Professeur : '.$professeur->getNom());
		return $this->render('professeur/consulter.html.twig', [
            'professeur' => $professeur,]);
	}

public function listerProfesseur(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Professeur::class);
		
		$professeurs= $repository->findAll();
		return $this->render('professeur/lister.html.twig', [
            'pProfesseurs' => $professeurs,]);	
			
	}

	public function ajouterProfesseur(Request $request,ManagerRegistry $doctrine){
        $professeur = new professeur();
	$form = $this->createForm(ProfesseurType::class, $professeur);
	$form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $professeur = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($professeur);
            $entityManager->flush();
 
	    return $this->render('professeur/consulter.html.twig', ['professeur' => $professeur,]);
	}
	else
        {
            return $this->render('professeur/ajouter.html.twig', array('form' => $form->createView(),));
	}
}

}

?>