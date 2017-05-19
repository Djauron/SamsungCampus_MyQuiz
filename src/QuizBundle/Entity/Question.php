<?php

namespace QuizBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\QuestionRepository")
 * @ORM\Table(name="quiz_question")
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name_question;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_quiz;


    /**
     * @ORM\ManyToOne(targetEntity="Quiz", inversedBy="quiz")
     * @ORM\JoinColumn(name="id_quiz", referencedColumnName="id")
     */

    private $quiz;

    /**
     * @ORM\OneToMany(targetEntity="Reponse", mappedBy="reponse")
     */

    private $reponse;

    public function __construct()
    {
        $this->quiz = new ArrayCollection();
        $this->reponse = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNameQuestion()
    {
        return $this->name_question;
    }

    public function setNameQuestion($name_question)
    {
        $this->name_question = $name_question;
    }

    public function getIdQuiz()
    {
        return $this->id_quiz;
    }

    public function setIdQuiz($id_quiz)
    {
        $this->id_quiz = $id_quiz;
    }

    public function getQuiz()
    {
        return $this->quiz;
    }

    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;
    }

    public function getReponse()
    {
        return $this->reponse;
    }

    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }
}