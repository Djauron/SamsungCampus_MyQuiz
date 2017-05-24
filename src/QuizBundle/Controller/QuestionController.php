<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Categorie;
use QuizBundle\Entity\Question;
use QuizBundle\Entity\Quiz;
use QuizBundle\Entity\Reponse;
use QuizBundle\Form\CategorieType;
use QuizBundle\Form\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class QuestionController extends Controller
{
    public function createAction(Request $request, $id)
    {

        $question = new Question();


        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $quiz = $em->getRepository('QuizBundle:Quiz')->find($id);
            $question->setQuiz($quiz);

            $question->setNameQuestion($form->getData()->getNameQuestion());
            for($i = 1; $i <= 4; $i++)
            {
                $reponse = new Reponse();
                $reponse->setNameReponse($request->request->get('quizbundle_question')['name_reponse'.$i]);
                $reponse->setResultat($request->request->get('quizbundle_question')['resultat'.$i]);
                $reponse->setQuestion($question);
                $em->persist($reponse);
            }
            $em->persist($question);

                $em->flush();


        }
        return $this->render('QuizBundle:Question:create_quiz_two.html.twig',array('form' => $form->createView()));
    }
}
