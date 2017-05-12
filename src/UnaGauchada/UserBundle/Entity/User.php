<?php

namespace UnaGauchada\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="UnaGauchada\UserBundle\Repository\UserRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"admin" = "Admin", "gaucho" = "Gaucho"})
 */
abstract class User {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=255, nullable=true)
     */
    protected $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="blob", nullable=true)
     */
    protected $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="photoMime", type="string", length=255, nullable=true)
     */
    protected $photoMime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sysDate", type="datetime")
     */
    protected $sysDate;

    public function __toString()
    {
        return $this->lastname . ", " . $this->name;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return User
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return User
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
     * Set photoMime
     *
     * @param string $photoMime
     *
     * @return User
     */
    public function setPhotoMime($photoMime)
    {
        $this->photoMime = $photoMime;

        return $this;
    }

    /**
     * Get photoMime
     *
     * @return string
     */
    public function getPhotoMime()
    {
        return $this->photoMime;
    }

    /**
     * Set sysDate
     *
     * @param \DateTime $sysDate
     *
     * @return User
     */
    public function setSysDate($sysDate)
    {
        $this->sysDate = $sysDate;

        return $this;
    }

    /**
     * Get sysDate
     *
     * @return \DateTime
     */
    public function getSysDate()
    {
        return $this->sysDate;
    }
}
