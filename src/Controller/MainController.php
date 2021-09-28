<?php

namespace App\Controller;

use App\Entity\Survey;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/", name="app_")
 */
class MainController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $surveyRepository = $this->getDoctrine()->getRepository(Survey::class);
        $surveys = $surveyRepository->findAll();

        return $this->render('app/index.html.twig', [
            'surveys' => $surveys,
        ]);
    }


}