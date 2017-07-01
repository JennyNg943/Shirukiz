<?php

namespace Shirukiz\MangaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table(name="livre")
 * @ORM\Entity(repositoryClass="Shirukiz\MangaBundle\Repository\MangaRepository")
 */
class Livre
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
     * @ORM\Column(name="Auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Shirukiz\MangaBundle\Entity\Genre")
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Shirukiz\MangaBundle\Entity\Type")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Shirukiz\MangaBundle\Entity\Editeur")
     */
    private $editeur;
    
    /**
     *
     * @var integer
     * 
     * @ORM\OneToMany(targetEntity="Shirukiz\MangaBundle\Entity\Volume",mappedBy="idLivre")
     */
    private $volume;
    
    /**
     *
     * @var integer
     * 
     * @ORM\OneToOne(targetEntity="Shirukiz\MangaBundle\Entity\Image", cascade={"persist"})
     */
    private $image;
    
    /**
     *
     * @var integer
     * 
     * @ORM\OneToOne(targetEntity="Shirukiz\MangaBundle\Entity\Image", cascade={"persist"})
     */
    private $imageBanniere;
    
     /**
     *
     * @var integer
     * 
     * @ORM\Column(name="nbVolume", type="integer", length=255)
     */
    private $nbVolume;
    
    /**
     *
     * @var integer
     * 
     * @ORM\ManyToOne(targetEntity="Shirukiz\MangaBundle\Entity\Statut")
     */
    private $statut;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(name="Description", type="string", length=1000)
     */
    private $description;
    
    /**
     * Get id
     *
     * @return int
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
     * @return Manga
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
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Manga
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Manga
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
     * Set type
     *
     * @param string $type
     *
     * @return Manga
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set editeur
     *
     * @param string $editeur
     *
     * @return Manga
     */
    public function setEditeur($editeur)
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get editeur
     *
     * @return string
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * Set volume
     *
     * @param integer $volume
     *
     * @return Manga
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer
     */
    public function getVolume()
    {
        return $this->volume;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->volume = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nbVolume
     *
     * @param integer $nbVolume
     *
     * @return Livre
     */
    public function setNbVolume($nbVolume)
    {
        $this->nbVolume = $nbVolume;

        return $this;
    }

    /**
     * Get nbVolume
     *
     * @return integer
     */
    public function getNbVolume()
    {
        return $this->nbVolume;
    }

    /**
     * Add volume
     *
     * @param \Shirukiz\MangaBundle\Entity\Volume $volume
     *
     * @return Livre
     */
    public function addVolume(\Shirukiz\MangaBundle\Entity\Volume $volume)
    {
        $this->volume[] = $volume;

        return $this;
    }

    /**
     * Remove volume
     *
     * @param \Shirukiz\MangaBundle\Entity\Volume $volume
     */
    public function removeVolume(\Shirukiz\MangaBundle\Entity\Volume $volume)
    {
        $this->volume->removeElement($volume);
    }

    /**
     * Set image
     *
     * @param \Shirukiz\MangaBundle\Entity\Image $image
     *
     * @return Livre
     */
    public function setImage(\Shirukiz\MangaBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Shirukiz\MangaBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return Livre
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Livre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageBanniere
     *
     * @param \Shirukiz\MangaBundle\Entity\Image $imageBanniere
     *
     * @return Livre
     */
    public function setImageBanniere(\Shirukiz\MangaBundle\Entity\Image $imageBanniere = null)
    {
        $this->imageBanniere = $imageBanniere;

        return $this;
    }

    /**
     * Get imageBanniere
     *
     * @return \Shirukiz\MangaBundle\Entity\Image
     */
    public function getImageBanniere()
    {
        return $this->imageBanniere;
    }
}
