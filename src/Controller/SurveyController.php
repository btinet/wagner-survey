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
        $now = new \DateTime('now');
        if ($survey->getStart() <= $now and $now <= $survey->getEnd()) {
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

            if ($request->isMethod('POST')) {
                //dd($request->request->all());

                if ($survey->getCode() == $request->request->get('Code') and $survey->getStart() <= $now and $now <= $survey->getEnd()) {

                    $form = $request->request->all();
                    /*
                    $previousResult = $this->getDoctrine()->getRepository(SurveyResult::class)
                        ->getNextLineNumber();
                    if($previousResult->getLineNumber()){
                        $lineNumber = $previousResult->getLineNumber();
                        $lineNumber++;
                    } else {
                        $lineNumber = 1;
                    }
                    */
                    $_form = [];
                    foreach ($form as $question => $answer) {
                        $_form[$question] = $answer;
                    }
                    try {
                        $surveyResult = new SurveyResult();
                        /*
                        $surveyResult->setQuestion($question);
                        $surveyResult->setAnswer($answer);
                        $surveyResult->setLineNumber($lineNumber);
                        */
                        $surveyResult->setContent($_form);

                        $manager->persist($surveyResult);
                    } catch (ORMException $e) {

                    }
                    $manager->flush();
                    $this->addFlash('success', 'Umfrage erfolgreich abgeschlossen. Vielen Dank!');
                    return $this->redirectToRoute('app_index');
                } else {
                    $this->addFlash('warning', 'Der Code stimmt nicht überein!');
                }
            }

            return $this->render('survey/show.html.twig', [
                'survey' => $survey,
            ]);

        } else {
            $this->addFlash('warning', 'Diese Umfrage ist abgelaufen!');
            return $this->redirectToRoute('app_index');
        }
    }


}