<?php

namespace QuizBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\QuizRepository")
 * @ORM\Table(name="quiz")
 */
class Quiz
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
    private $name_quiz;

    /**
     * @ORM\Column(type="integer")
     */
    private $createur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $update_at = null;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_theme;


    /**
     * @ManyToOne(targetEntity="Theme")
     * @JoinColumn(name="id_theme", referencedColumnName="id")
     */

    private $theme;

    /**
     * @ManyToOne(targetEntity="Categorie")
     * @JoinColumn(name="id_categorie", referencedColumnName="id")
     */

    private $categorie;

    /**
     * @ManyToOne(targetEntity="AppBundle\Entity\User")
     * @JoinColumn(name="createur", referencedColumnName="id")
     */

    private $user;

    /**
     * @OneToMany(targetEntity="Question", mappedBy="question")
     */

    private $question;


    public function __construct()
    {
        $this->theme = new ArrayCollection();
        $this->categorie = new ArrayCollection();
        $this->user = new ArrayCollection();
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

    public function getNameQuiz()
    {
        return $this->name_quiz;
    }

    public function setNameQuiz($name_quiz)
    {
        $this->name_quiz = $name_quiz;
    }

    public function getCreateur()
    {
        return $this->createur;
    }

    public function setCreateur($createur)
    {
        $this->createur = $createur;
    }

    public function getCreateAt()
    {
        return $this->create_at;
    }

    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;
    }

    public function getUpdateAt()
    {
        return $this->update_at;
    }

    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;
    }

    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    public function getIdTheme()
    {
        return $this->id_theme;
    }

    public function setIdTheme($id_theme)
    {
        $this->id_theme = $id_theme;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
        return $this;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}