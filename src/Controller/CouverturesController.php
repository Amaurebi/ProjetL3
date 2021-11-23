<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CouverturesController extends AbstractController
{
    /**
     * @Route("/couvertures", name="couvertures")
     */
    public function index(): Response
    {
        return $this->render('couvertures/index.html.twig', [
            'controller_name' => 'CouverturesController',
        ]);
    }
}
