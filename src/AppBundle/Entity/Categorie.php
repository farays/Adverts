<?php

namespace AppBundle\Entity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="entity_categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Entity\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="nomcate", type="string", length=30)
     */
    private $nomcate;


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
     * Set nomcate
     *
     * @param string $nomcate
     *
     * @return Categorie
     */
    public function setNomcate($nomcate)
    {
        $this->nomcate = $nomcate;

        return $this;
    }

    /**
     * Get nomcate
     *
     * @return string
     */
    public function getNomcate()
    {
        return $this->nomcate;
    }

}

