<?php

namespace App\Controller;

use App\Entity\Realisation;
use App\Form\RealisationType;
use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CouverturesController extends AbstractController
{
    /**
     * @Route("/couvertures", name="couvertures")
     */
    public function index(RealisationRepository $realisationRepository): Response
    {
        return $this->render('couvertures/index.html.twig', [
            'controller_name' => 'CouverturesController',
            'realisations' => $realisationRepository->last3ByCategory(2),
        ]);
    }
}
