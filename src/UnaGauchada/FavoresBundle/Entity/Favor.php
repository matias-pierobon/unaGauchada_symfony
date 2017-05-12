<?php

namespace UnaGauchada\FavoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favor
 *
 * @ORM\Table(name="favores")
 * @ORM\Entity(repositoryClass="UnaGauchada\FavoresBundle\Repository\FavorRepository")
 */
class Favor
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sysDate", type="datetime")
     */
    private $sysDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="UnaGauchada\UserBundle\Entity\Gaucho", inversedBy="solicitudes")
     * @ORM\JoinColumn(name="gaucho_id", referencedColumnName="id")
     */
    private $solicitante;

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
     * Set title
     *
     * @param string $title
     *
     * @return Favor
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Favor
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set sysDate
     *
     * @param \DateTime $sysDate
     *
     * @return Favor
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
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Favor
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set solicitante
     *
     * @param \UnaGauchada\UserBundle\Entity\Gaucho $solicitante
     *
     * @return Favor
     */
    public function setSolicitante(\UnaGauchada\UserBundle\Entity\Gaucho $solicitante = null)
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    /**
     * Get solicitante
     *
     * @return \UnaGauchada\UserBundle\Entity\Gaucho
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }
}
