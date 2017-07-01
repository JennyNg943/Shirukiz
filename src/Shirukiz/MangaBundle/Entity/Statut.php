<?php

namespace Shirukiz\MangaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statut
 *
 * @ORM\Table(name="statut")
 * @ORM\Entity(repositoryClass="Shirukiz\MangaBundle\Repository\StatutRepository")
 */
class Statut
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
     * @return Type
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
    
    public function __toString()
    {         
        return (string) $this->nom;
    }
}
