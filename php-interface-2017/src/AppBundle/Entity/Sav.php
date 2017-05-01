<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sav
 *
 * @ORM\Table(name="sav")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SavRepository")
 */
class Sav
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
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="diagnostique", type="string", length=1024)
     */
    private $diagnostic;


    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     */
    private $utilisateur;


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
     * Set etat
     *
     * @param string $etat
     *
     * @return Sav
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Sav
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set diagnostique
     *
     * @param string $diagnostique
     *
     * @return Sav
     */

    /**
     * Set diagnostic
     *
     * @param string $diagnostic
     *
     * @return Sav
     */
    public function setDiagnostic($diagnostic)
    {
        $this->diagnostic = $diagnostic;

        return $this;
    }

    /**
     * Get diagnostic
     *
     * @return string
     */
    public function getDiagnostic()
    {
        return $this->diagnostic;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Sav
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
