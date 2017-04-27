<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posseder
 *
 * @ORM\Table(name="posseder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PossederRepository")
 */
class Posseder
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
     * @ORM\Column(name="utilisateur", type="string", length=255)
     */
    private $utilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="equipement", type="string", length=255)
     */
    private $equipement;


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
     * Set utilisateur
     *
     * @param string $utilisateur
     *
     * @return Posseder
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return string
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set equipement
     *
     * @param string $equipement
     *
     * @return Posseder
     */
    public function setEquipement($equipement)
    {
        $this->equipement = $equipement;

        return $this;
    }

    /**
     * Get equipement
     *
     * @return string
     */
    public function getEquipement()
    {
        return $this->equipement;
    }
}

