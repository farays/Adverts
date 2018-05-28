<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    /**
     * @var string
     *
     * @ORM\Column(name="nomprenom", type="string", length=100)
     */
    private $nomprenom;
    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=100, unique=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdpass", type="string", length=100)
     */
    private $mdpass;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=20)
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=25, unique=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=200, nullable=true, unique=true)
     */
    private $mail;

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
     * Set nomprenom
     *
     * @param string $nomprenom
     *
     * @return Client
     */
    public function setNomprenom($nomprenom)
    {
        $this->login = $nomprenom;

        return $this;
    }
    /**
     * Get nomprenom
     *
     * @return string
     */
    public function getNomprenom()
    {
        return $this->nomprenom;
    }
    /**
     * Set login
     *
     * @param string $login
     *
     * @return Client
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdpass
     *
     * @param string $mdpass
     *
     * @return Client
     */
    public function setMdpass($mdpass)
    {
        $this->mdpass = $mdpass;

        return $this;
    }

    /**
     * Get mdpass
     *
     * @return string
     */
    public function getMdpass()
    {
        return $this->mdpass;
    }

    /**
     * Set profil
     *
     * @param string $profil
     *
     * @return Client
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Client
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Client
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }
}