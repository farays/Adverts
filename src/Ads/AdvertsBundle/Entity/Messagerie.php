<?php

namespace Ads\AdvertsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * messagerie
 *
 * @ORM\Table(name="messagerie")
 * @ORM\Entity(repositoryClass="Ads\AdvertsBundle\Repository\messagerieRepository")
 */
class   Messagerie
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
     * @ORM\Column(name="message", type="string", length=255, unique=false)
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *     @ORM\JoinColumn(name="sender", referencedColumnName="id")
     * })
     */
    private $sender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateenvoi", type="date")
     */
    private $dateenvoi;

    /**
     * @ORM\ManyToOne(targetEntity="\Ads\AdvertsBundle\Entity\Annonce")
     * @ORM\JoinColumns({
     *     @ORM\JoinColumn(name="idannonce", referencedColumnName="id")
     * })
     */
    private $idannonce;

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
     * Set message
     *
     * @param string $message
     *
     * @return Messagerie
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
     * Set dateenvoi
     *
     * @param \DateTime $dateenvoi
     *
     * @return Messagerie
     */
    public function setDateenvoi($dateenvoi)
    {
        $this->dateenvoi = $dateenvoi;

        return $this;
    }

    /**
     * Get dateenvoi
     *
     * @return \DateTime
     */
    public function getDateenvoi()
    {
        return $this->dateenvoi;
    }

    /**
     * Set sender
     *
     * @param \AppBundle\Entity\User $sender
     *
     * @return Messagerie
     */
    public function setSender(\AppBundle\Entity\User $sender = null)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \AppBundle\Entity\User
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set idannonce
     *
     * @param \Ads\AdvertsBundle\Entity\Annonce $idannonce
     *
     * @return Messagerie
     */
    public function setIdannonce(\Ads\AdvertsBundle\Entity\Annonce $idannonce = null)
    {
        $this->idannonce = $idannonce;

        return $this;
    }

    /**
     * Get idannonce
     *
     * @return \Ads\AdvertsBundle\Entity\Annonce
     */
    public function getIdannonce()
    {
        return $this->idannonce;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->dateenvoi = new \DateTime();
    }
}
