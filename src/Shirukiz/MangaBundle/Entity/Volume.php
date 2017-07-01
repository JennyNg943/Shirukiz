<?php

namespace Shirukiz\MangaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Volume
 *
 * @ORM\Table(name="volume")
 * @ORM\Entity(repositoryClass="Shirukiz\MangaBundle\Repository\VolumeRepository")
 */
class Volume
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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Shirukiz\MangaBundle\Entity\Livre")
     */
    private $idLivre;

    /**
     * @var integer
     *
     * @ORM\Column(name="Volume", type="integer", length=255)
     */
    private $Volume;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAchat", type="date")
     */
    private $dateAchat;
    
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
     * @ORM\Column(name="Possession", type="integer")
     */
    private $possession;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
       $this->dateAchat = new \DateTime('now');
    }
    
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Volume
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
     * Set idLivre
     *
     * @param integer $idLivre
     *
     * @return Volume
     */
    public function setIdLivre($idLivre)
    {
        $this->idLivre = $idLivre;

        return $this;
    }

    /**
     * Get idLivre
     *
     * @return integer
     */
    public function getIdLivre()
    {
        return $this->idLivre;
    }

    /**
     * Set volume
     *
     * @param integer $volume
     *
     * @return Volume
     */
    public function setVolume($volume)
    {
        $this->Volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer
     */
    public function getVolume()
    {
        return $this->Volume;
    }

    /**
     * Set dateAchat
     *
     * @param \DateTime $dateAchat
     *
     * @return Volume
     */
    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    /**
     * Get dateAchat
     *
     * @return \DateTime
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }

    /**
     * Set image
     *
     * @param \Shirukiz\MangaBundle\Entity\Image $image
     *
     * @return Volume
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
     * Set possession
     *
     * @param integer $possession
     *
     * @return Volume
     */
    public function setPossession($possession)
    {
        $this->possession = $possession;

        return $this;
    }

    /**
     * Get possession
     *
     * @return integer
     */
    public function getPossession()
    {
        return $this->possession;
    }
}
