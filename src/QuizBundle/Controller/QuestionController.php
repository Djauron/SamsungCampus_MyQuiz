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
    public function createAction(Request $request)
    {

        $question = new Question();
        $reponse = new Reponse();

        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create(QuestionType::class, $question);

        $question->setNameQuestion($form->getData()->getNameQuestion());
        //$reponse->setNameReponse($form->get('name_reponse')->getData());


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            try
            {
                return $this->render('QuizBundle:Question:create_quiz_two.html.twig');
            }
            catch(\Exception $e)
            {
                $this->get('session')->getFlashBag()->add('warning', 'Erreur');
            }
        }
        return $this->render('QuizBundle:Question:create_quiz_two.html.twig',array('form' => $form->createView()));
    }
}
