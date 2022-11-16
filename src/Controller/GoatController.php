<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GoatController extends AbstractController
{
     /*
    *#[Route('/goat', name: 'app_goat')]
    */
    public function index(): Response
    {
        return $this->render('goat/accueil.html.twig', [
            'controller_name' => 'GoatController',
        ]);
    }
}
