<?php

namespace Shirukiz\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Shirukiz\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     *
     * @var integer
     * 
     * @ORM\OneToOne(targetEntity="Shirukiz\MangaBundle\Entity\Image", cascade={"persist"})
     */
    protected $image;
    
    /**
     *
     * @var integer
     * 
     * @ORM\OneToMany(targetEntity="Shirukiz\AnimeBundle\Entity\AnimeUser", mappedBy="idUser")
     */
    protected $anime;
    
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
     * Set image
     *
     * @param \Shirukiz\MangaBundle\Entity\Image $image
     *
     * @return User
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
     * Add anime
     *
     * @param \Shirukiz\AnimeBundle\Entity\AnimeUser $anime
     *
     * @return User
     */
    public function addAnime(\Shirukiz\AnimeBundle\Entity\AnimeUser $anime)
    {
        $this->anime[] = $anime;

        return $this;
    }

    /**
     * Remove anime
     *
     * @param \Shirukiz\AnimeBundle\Entity\AnimeUser $anime
     */
    public function removeAnime(\Shirukiz\AnimeBundle\Entity\AnimeUser $anime)
    {
        $this->anime->removeElement($anime);
    }

    /**
     * Get anime
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnime()
    {
        return $this->anime;
    }
}
