<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Shirukiz\MangaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anime
 *
 * @ORM\Table(name="anime")
 * @ORM\Entity(repositoryClass="Shirukiz\MangaBundle\Repository\AnimeRepository")
 */
class Anime
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
     * @ORM\Column(name="Genre", type="string", length=255)
     */
    private $genre;

    /**
     * @var integer
     *
     * @ORM\Column(name="Episode", type="integer", length=255)
     */
    private $episode;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Shirukiz\MangaBundle\Entity\Image", cascade={"persist"})
     */
    private $image;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=10000)
     */
    private $description;


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
     * @return Anime
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
     * Set genre
     *
     * @param string $genre
     *
     * @return Anime
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
     * Set image
     *
     * @param \Shirukiz\MangaBundle\Entity\Image $image
     *
     * @return Anime
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
     * Set episode
     *
     * @param integer $episode
     *
     * @return Anime
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return integer
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Anime
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
}
