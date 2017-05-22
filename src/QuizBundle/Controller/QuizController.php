<?php

namespace QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use QuizBundle\Entity\Quiz;
use QuizBundle\Form\QuizType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;

class QuizController extends Controller
{
    public function indexAction()
    {
        return $this->render('QuizBundle:Quiz:index.html.twig');
    }

    public function createAction(Request $request)
    {
        $quiz = new Quiz();

        $form = $this->get('form.factory')->create(QuizType::class, $quiz, array('block_name' => 'create_quiz'));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $quizName = $form->getData()->getNameQuiz();
            $categorieQuiz= $request->request->get('quizbundle_quiz')['id_categorie'];

            try
            {

                return $this->redirectToRoute('quiz_create_quiz_two', array(
                    'nameQuiz' => $quizName,
                    'quizCategorie' => $categorieQuiz
                ));

            }
            catch(\Exception $e)
            {
                $this->get('session')->getFlashBag()->add('warning', 'Erreur');
            }
        }

        return $this->render('QuizBundle:Quiz:create_quiz.html.twig', array('form' => $form->createView()));
    }

    public function createtwoAction(Request $request, $nameQuiz, $quizCategorie)
    {
        $quiz = new Quiz();

        $form = $this->get('form.factory')->create(QuizType::class, $quiz, array('block_name' => 'create_quiz_two'));
        $date_created = date("Y-m-d H:i:s");
        $date_update = date("Y-m-d H:i:s");
        $user = $this->getUser()->getId();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            try
            {
                return $this->render('QuizBundle:Quiz:create_quiz_two.html.twig');
            }
            catch(\Exception $e)
            {
                $this->get('session')->getFlashBag()->add('warning', 'Categorie deja existante');
            }
        }
        return $this->render('QuizBundle:Quiz:create_quiz_two.html.twig',array('form' => $form->createView()));
    }
}
