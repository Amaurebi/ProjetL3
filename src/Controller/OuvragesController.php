<?php

namespace App\Controller;

use App\Entity\Realisation;
use App\Form\RealisationType;
use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OuvragesController extends AbstractController
{
    /**
     * @Route("/ouvrages", name="ouvrages")
     */
    public function index(RealisationRepository $realisationRepository): Response
    {
        return $this->render('ouvrages/index.html.twig', [
            'controller_name' => 'OuvragesController',
            'realisations' => $realisationRepository->last3ByCategory(3),
        ]);
    }
}
