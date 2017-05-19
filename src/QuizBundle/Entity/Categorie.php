<?php

namespace QuizBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\CategorieRepository")
 * @ORM\Table(name="quiz_categorie", uniqueConstraints={@UniqueConstraint(name="search_idx", columns={"name_categorie"})})
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
     * @ORM\OneToMany(targetEntity="Theme", mappedBy="categorie")
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

    public function getTheme()
    {
        return $this->theme;
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
        return $this->theme;
    }


}