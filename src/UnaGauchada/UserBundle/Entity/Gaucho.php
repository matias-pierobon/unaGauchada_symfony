<?php

namespace UnaGauchada\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gaucho
 *
 * @ORM\Table(name="gauchos")
 * @ORM\Entity(repositoryClass="UnaGauchada\UserBundle\Repository\GauchoRepository")
 */
class Gaucho extends User
{
    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="UnaGauchada\FavoresBundle\Entity\Favor", mappedBy="solicitante")
     */
    private $solicitudes;

    public function isAdmin(){
        return false;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->solicitudes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Gaucho
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
     * @return Gaucho
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
     * @return Gaucho
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
     * @return Gaucho
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
     * @return Gaucho
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
     * @return Gaucho
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
     * @return Gaucho
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
     * @return Gaucho
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
     * @return Gaucho
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

    /**
     * Add solicitude
     *
     * @param \UnaGauchada\FavoresBundle\Entity\Favor $solicitude
     *
     * @return Gaucho
     */
    public function addSolicitud(\UnaGauchada\FavoresBundle\Entity\Favor $solicitud)
    {
        $this->solicitudes[] = $solicitud;

        return $this;
    }

    /**
     * Remove solicitude
     *
     * @param \UnaGauchada\FavoresBundle\Entity\Favor $solicitud
     */
    public function removeSolicitud(\UnaGauchada\FavoresBundle\Entity\Favor $solicitud)
    {
        $this->solicitudes->removeElement($solicitud);
    }

    /**
     * Get solicitudes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSolicitudes()
    {
        return $this->solicitudes;
    }
}
