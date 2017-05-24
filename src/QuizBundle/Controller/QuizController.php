<?php

namespace QuizBundle\Controller;

use QuizBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use QuizBundle\Entity\Quiz;
use QuizBundle\Form\QuizType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class QuizController extends Controller
{
    public function indexAction()
    {
        $quiz = new Quiz();
        $em = $this->getDoctrine()->getManager();
        $quiz = $em->getRepository('QuizBundle:Quiz')->findAll();

        return $this->render('QuizBundle:Quiz:index.html.twig', array('quizs' => $quiz));
    }

    public function createAction(Request $request)
    {
        $quiz = new Quiz();
        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create(QuizType::class, $quiz, array('block_name' => 'create_quiz'));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $date_created = new \DateTime(date("Y-m-d H:i:s"));

            $user = $em->getRepository('AppBundle:User')->find($this->getUser()->getId());
            $theme = $em->getRepository('QuizBundle:Theme')->find($form->getData()->getIdTheme());
            $categorie = $em->getRepository('QuizBundle:Categorie')->find($theme->getIdCategorie());

            $quiz->setNameQuiz($form->getData()->getNameQuiz());
            $quiz->setCategorie($categorie);
            $quiz->setUser($user);
            $quiz->setCreateAt($date_created);
            $quiz->setUpdateAt($date_created);
            $quiz->setTheme($theme);
            $em->persist($quiz);
            $em->flush();
            $idQuiz = $quiz->getId();
            return $this->redirectToRoute('quiz_create_quiz_two', ['id' => $idQuiz]);


        }

        return $this->render('QuizBundle:Quiz:create_quiz.html.twig', array('form' => $form->createView()));
    }

    public function playAction(Request $request, $id)
    {
        return $this->render('QuizBundle:Quiz:play_quiz.html.twig');
    }
}
