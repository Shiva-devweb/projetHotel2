<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TheRoyalVillaController extends AbstractController
{
    #[Route('/the/royal/villa', name: 'the_royal_villa')]
    public function index(): Response
    {
        return $this->render('the_royal_villa/index.html.twig', [
            'controller_name' => 'TheRoyalVillaController',
        ]);
    }
}
