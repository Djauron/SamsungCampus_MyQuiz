<?php

namespace QuizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuizController extends Controller
{
    public function indexAction()
    {
        return $this->render('QuizBundle:Quiz:index.html.twig');
    }

    public function quizAction()
    {
        return $this->render('QuizBundle:Quiz:quiz.html.twig');
    }
}
