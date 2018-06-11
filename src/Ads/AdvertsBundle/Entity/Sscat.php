<?php

namespace Ads\AdvertsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sscat
 *
 * @ORM\Table(name="entity_sscat")
 * @ORM\Entity(repositoryClass="Ads\AdvertsBundle\Repository\Entity\SscatRepository")
 */
class Sscat
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
     * @ORM\Column(name="nomsscat", type="string", length=50)
     */
    private $nomsscat;

    /**
     * @var int
     ** @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="idcat", referencedColumnName="id")
     * @ORM\Column(name="idcat", type="integer")
     */
    private $idcat;


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
     * Set nomsscat
     *
     * @param string $nomsscat
     *
     * @return Sscat
     */
    public function setNomsscat($nomsscat)
    {
        $this->nomsscat = $nomsscat;

        return $this;
    }

    /**
     * Get nomsscat
     *
     * @return string
     */
    public function getNomsscat()
    {
        return $this->nomsscat;
    }

    /**
     * Set idcat
     *
     * @param integer $idcat
     *
     * @return Sscat
     */
    public function setIdcat($idcat)
    {
        $this->idcat = $idcat;

        return $this;
    }

    /**
     * Get idcat
     *
     * @return int
     */
    public function getIdcat()
    {
        return $this->idcat;
    }
}

