<?php

namespace Shirukiz\MangaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jeux
 *
 * @ORM\Table(name="jeux")
 * @ORM\Entity(repositoryClass="Shirukiz\MangaBundle\Repository\JeuxRepository")
 */
class Jeux
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Shirukiz\MangaBundle\Entity\Plateforme", cascade={"persist"})
     */
    private $plateforme;
    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Shirukiz\MangaBundle\Entity\Image", cascade={"persist"})
     */
    private $image;
    /**
     * @var string
     *
     * @ORM\Column(name="Genre", type="string", length=255)
     */
    private $genre;
    /**
     * @var string
     *
     * @ORM\Column(name="Multijoueur", type="string", length=255)
     */
    private $multijoueur;
    
    /**
     * @var Date
     *
     * @ORM\Column(name="Date", type="date", length=255)
     */
    private $date;
    
     public function __construct()
    {
       $this->date = new \DateTime('now');
    }
    
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Jeux
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set plateforme
     *
     * @param string $plateforme
     *
     * @return Jeux
     */
    public function setPlateforme($plateforme)
    {
        $this->plateforme = $plateforme;

        return $this;
    }

    /**
     * Get plateforme
     *
     * @return string
     */
    public function getPlateforme()
    {
        return $this->plateforme;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Jeux
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Jeux
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set multijoueur
     *
     * @param string $multijoueur
     *
     * @return Jeux
     */
    public function setMultijoueur($multijoueur)
    {
        $this->multijoueur = $multijoueur;

        return $this;
    }

    /**
     * Get multijoueur
     *
     * @return string
     */
    public function getMultijoueur()
    {
        return $this->multijoueur;
    }

    

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Jeux
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
