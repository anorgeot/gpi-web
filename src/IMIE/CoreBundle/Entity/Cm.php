<?php

namespace IMIE\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Cm
 *
 * @ORM\Table(name="cm")
 * @ORM\Entity(repositoryClass="IMIE\CoreBundle\Repository\CmRepository")
 * @ExclusionPolicy("all")
 */
class Cm
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose 
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25)
     * @Expose        
     */
    private $nom;

    /**
    * @ORM\ManyToOne(targetEntity="IMIE\CoreBundle\Entity\Constructeur")
    * @ORM\JoinColumn(nullable=false)
     * @Expose       
    */
    private $constructeur;

    /**
    * @ORM\ManyToOne(targetEntity="IMIE\CoreBundle\Entity\Socket")
    * @ORM\JoinColumn(nullable=false)
     * @Expose       
    */
    private $socket;

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
     * Set nom
     *
     * @param string $nom
     * @return Cm
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set constructeur
     *
     * @param \IMIE\CoreBundle\Entity\Constructeur $constructeur
     * @return Cm
     */
    public function setConstructeur(\IMIE\CoreBundle\Entity\Constructeur $constructeur)
    {
        $this->constructeur = $constructeur;

        return $this;
    }

    /**
     * Get constructeur
     *
     * @return \IMIE\CoreBundle\Entity\Constructeur 
     */
    public function getConstructeur()
    {
        return $this->constructeur;
    }

    /**
     * Set socket
     *
     * @param \IMIE\CoreBundle\Entity\Socket $socket
     * @return Cm
     */
    public function setSocket(\IMIE\CoreBundle\Entity\Socket $socket)
    {
        $this->socket = $socket;

        return $this;
    }

    /**
     * Get socket
     *
     * @return \IMIE\CoreBundle\Entity\Socket 
     */
    public function getSocket()
    {
        return $this->socket;
    }
}
