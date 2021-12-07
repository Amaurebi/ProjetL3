<?php

namespace App\Controller;

use App\Entity\Realisation;
use App\Form\RealisationType;
use App\Entity\Fichier;
use App\Form\FichierType;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/realisation")
 */
class RealisationController extends AbstractController
{
    /**
     * @Route("/", name="realisation_index", methods={"GET"})
     */
    public function index(
        RealisationRepository $realisationRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        $data = $realisationRepository->findAllByDate();
        $realisations = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('realisation/index.html.twig', [
            'pagination' => $realisations,
        ]);
    }

    /**
     * @Route("/{id}", name="realisation_show", methods={"GET"})
     */
    public function show(Realisation $realisation): Response
    {
        return $this->render('realisation/show.html.twig', [
            'realisation' => $realisation,
        ]);
    }
}
