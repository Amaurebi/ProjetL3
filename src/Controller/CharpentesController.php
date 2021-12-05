<?php

namespace App\Controller;

use App\Entity\Realisation;
use App\Form\RealisationType;
use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharpentesController extends AbstractController
{
    /**
     * @Route("/charpentes", name="charpentes")
     */
    public function index(RealisationRepository $realisationRepository): Response
    {
        return $this->render('charpentes/index.html.twig', [
            'controller_name' => 'CharpentesController',
            'realisations' => $realisationRepository->last3ByCategory(1),
        ]);
    }
}
