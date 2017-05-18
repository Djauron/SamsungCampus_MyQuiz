<?php

namespace QuizBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\JoinColumn;


/**
 * @ORM\Entity(repositoryClass="QuizBundle/Entity/ReponseRepository")
 * @ORM\Table(name="quiz_reponse")
 */
class Reponse
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
    private $name_reponse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resultat;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_question;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="question")
     * @ORM\JoinColumn(name="id_question", referencedColumnName="id")
     */

    private $question;

    public function __construct()
    {
        $this->question = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNameReponse()
    {
        return $this->name_reponse;
    }

    public function setNameReponse($name_reponse)
    {
        $this->name_reponse = $name_reponse;
    }

    public function getResultat()
    {
        return $this->resultat;
    }

    public function setResultat($resultat)
    {
        $this->resultat = $resultat;
    }

    public function getIdQuestion()
    {
        return $this->id_question;
    }

    public function setIdQuestion($id_question)
    {
        $this->id_question = $id_question;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
    }

}