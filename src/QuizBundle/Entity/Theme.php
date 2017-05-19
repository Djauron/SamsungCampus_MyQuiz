<?php

namespace QuizBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\ThemeRepository")
 * @ORM\Table(name="quiz_theme", uniqueConstraints={@UniqueConstraint(name="search_idx", columns={"name_theme"})})
 */
class Theme
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
    private $name_theme;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="theme")
     * @ORM\JoinColumn(name="id_categorie", referencedColumnName="id")
     */

    private $categorie;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNameTheme()
    {
        return $this->name_theme;
    }

    public function setNameTheme($name_theme)
    {
        $this->name_theme = $name_theme;
    }

    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this->categorie;
    }

}