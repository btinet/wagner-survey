<?php

namespace App\Controller;

use App\Entity\Survey;
use App\Entity\SurveyResult;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/survey", name="survey_")
 */
class SurveyController extends AbstractController
{

    /**
     * @Route("/{id}", name="show")
     */
    public function show(Survey $survey, Request $request, EntityManagerInterface $manager): Response
    {

        /*
        $form = $this->createFormBuilder(new Survey());
        foreach($survey->getSurveyLines() as $line){
            if($line->getAnswers()){
                $form->add($line->getTitle(),ChoiceType::class,[
                    'choices' => $line->getAnswers()
                ]);
            } else {
                $form->add('',TextType::class);
            }
        }
        $form->getForm();
        */

        if($request->isMethod('POST')){
            $_form = [];
            $surveyResult = new SurveyResult();
            $form = $request->request->all();
            $surveyResult->setTitle($survey->getTitle());
            foreach($form as $key => $value){
                $_form[$key] = $value;
            }
            $surveyResult->setContent($_form);
            try {
                $manager->persist($surveyResult);
                $manager->flush();
            } catch (ORMException $e) {
            }
            $this->addFlash('success','Umfrage erfolgreich abgeschlossen');
            return $this->redirectToRoute('app_index');
        }

        return $this->render('survey/show.html.twig', [
            'survey' => $survey,
        ]);
    }


}