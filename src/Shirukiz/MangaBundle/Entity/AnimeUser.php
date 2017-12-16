<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Shirukiz\MangaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnimeUser
 *
 * @ORM\Table(name="animeUser")
 * @ORM\Entity
 */
class AnimeUser
{

    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Shirukiz\UserBundle\Entity\User",cascade={"persist"})
     */
    private $idUser;
    
    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Shirukiz\MangaBundle\Entity\Anime",cascade={"persist"})
     */
    private $idAnime;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbVue", type="string", length=255)
     */
    private $nbVue;
    
    /**
     *
     * @var integer
     * 
     * @ORM\ManyToOne(targetEntity="Shirukiz\MangaBundle\Entity\Statut")
     */
    private $statut;
    

    

    /**
     * Set nbVue
     *
     * @param string $nbVue
     *
     * @return AnimeUser
     */
    public function setNbVue($nbVue)
    {
        $this->nbVue = $nbVue;

        return $this;
    }

    /**
     * Get nbVue
     *
     * @return string
     */
    public function getNbVue()
    {
        return $this->nbVue;
    }

    /**
     * Set idUser
     *
     * @param \Shirukiz\UserBundle\Entity\User $idUser
     *
     * @return AnimeUser
     */
    public function setIdUser(\Shirukiz\UserBundle\Entity\User $idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \Shirukiz\UserBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idAnime
     *
     * @param \Shirukiz\MangaBundle\Entity\Anime $idAnime
     *
     * @return AnimeUser
     */
    public function setIdAnime(\Shirukiz\MangaBundle\Entity\Anime $idAnime)
    {
        $this->idAnime = $idAnime;

        return $this;
    }

    /**
     * Get idAnime
     *
     * @return \Shirukiz\MangaBundle\Entity\Anime
     */
    public function getIdAnime()
    {
        return $this->idAnime;
    }

    /**
     * Set statut
     *
     * @param \Shirukiz\MangaBundle\Entity\Statut $statut
     *
     * @return AnimeUser
     */
    public function setStatut(\Shirukiz\MangaBundle\Entity\Statut $statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \Shirukiz\MangaBundle\Entity\Statut
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
