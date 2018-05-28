<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Client;
use AppBundle\Entity\Categorie;
/**
 * Annonce
 *
 * @ORM\Table(name="entity_annonce")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Entity\AnnonceRepository")
 */
class Annonce
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
     * @ORM\Column(name="description", type="string", length=255, unique=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="blob", nullable=true)
     */
    private $photo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepub", type="date")
     */
    private $datepub;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="idclient", referencedColumnName="id")
     * @ORM\Column(name="idclient", type="integer")
     */
    private $idclient;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=100, nullable=true)
     */
    private $lieu;
    /**
     * @var int
     ** @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="idcategorie", referencedColumnName="id")
     * @ORM\Column(name="idcategorie", type="integer")
     */
    private $idcategorie;


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
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
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
     * Set photo
     *
     * @param string $photo
     *
     * @return Annonce
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set datepub
     *
     * @param \DateTime $datepub
     *
     * @return Annonce
     */
    public function setDatepub($datepub)
    {
        $this->datepub = $datepub;

        return $this;
    }

    /**
     * Get datepub
     *
     * @return \DateTime
     */
    public function getDatepub()
    {
        return $this->datepub;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Annonce
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Annonce
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set idclient
     *
     * @param integer $idclient
     *
     * @return Annonce
     */
    public function setIdclient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }

    /**
     * Get idclient
     *
     * @return int
     */
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Annonce
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }
    /**
     * Set idcategorie
     *
     * @param integer $idcategorie
     *
     * @return Annonce
     */
    public function setIdcategorie($idcategorie)
    {
        $this->idclient = $idcategorie;

        return $this;
    }

    /**
     * Get idcategorie
     *
     * @return int
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }
}

