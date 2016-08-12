<?php

namespace IMIE\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Socket
 *
 * @ORM\Table(name="socket")
 * @ORM\Entity(repositoryClass="IMIE\CoreBundle\Repository\SocketRepository")
  * @ExclusionPolicy("all") 
 */
class Socket
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
     * @ORM\Column(name="nom", type="string", length=25, unique=true)
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
     * @return Socket
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
     * @return Socket
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
}
