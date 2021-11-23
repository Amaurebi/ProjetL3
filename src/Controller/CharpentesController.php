<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharpentesController extends AbstractController
{
    /**
     * @Route("/charpentes", name="charpentes")
     */
    public function index(): Response
    {
        return $this->render('charpentes/index.html.twig', [
            'controller_name' => 'CharpentesController',
        ]);
    }
}
