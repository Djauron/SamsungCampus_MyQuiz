<?php

namespace QuizBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="QuizBundle/Entity/CategorieRepository")
 * @ORM\Table(name="quiz_categorie")
 */
class Categorie
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
    private $name_categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_theme;

    /**
     * @ORM\ManyToOne(targetEntity="Theme", inversedBy="theme")
     * @ORM\JoinColumn(name="id_theme", referencedColumnName="id")
     */

    private $theme;

    public function __construct()
    {
        $this->theme = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNameCategorie()
    {
        return $this->name_categorie;
    }

    public function setNameCategorie($name_categorie)
    {
        $this->name_categorie = $name_categorie;
    }

    public function getIdTheme()
    {
        return $this->id_theme;
    }

    public function setIdTheme($id_theme)
    {
        $this->id_theme = $id_theme;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
    }
}