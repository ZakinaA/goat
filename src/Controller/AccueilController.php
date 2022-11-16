<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /*
     * @Route("/etudiant", name="etudiant")
     */
    public function index()
    {
     	/* Cette simple instruction permet d'envoyer des informations au navigateur sans passer par une vue.
        return new Response('<html><body>Salut Les Eleves</body></html>');
        */
 
         // initialise une variable qui sera exploitée dans la vue
         $annee = '2023';
         return $this->render('accueil/accueil.html.twig', ['pAnnee' => $annee,
        ]);				         
    }
}