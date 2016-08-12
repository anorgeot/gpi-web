<?php

namespace IMIE\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * TypeMateriel
 *
 * @ORM\Table(name="type_materiel")
 * @ORM\Entity(repositoryClass="IMIE\CoreBundle\Repository\TypeMaterielRepository")
 * @ExclusionPolicy("all")
 */
class TypeMateriel
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
     * @ORM\Column(name="materiel", type="string", length=25)
     * @Expose   
     */
    private $materiel;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=25)
     * @Expose   
     */
    private $type;   

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     * @Expose     
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="vitesse", type="integer", nullable=true)
     * @Expose     
     */
    private $vitesse;

    /**
     * @var int
     *
     * @ORM\Column(name="port", type="integer", nullable=true)
     * @Expose     
     */
    private $port;

    /**
     * @var int
     *
     * @ORM\Column(name="ram", type="integer", nullable=true)
     * @Expose     
     */
    private $ram;

    /**
     * @var int
     *
     * @ORM\Column(name="disque", type="integer", nullable=true)
     * @Expose     
     */
    private $disque;

    /**
    * @ORM\ManyToOne(targetEntity="IMIE\CoreBundle\Entity\Processeur")
    * @ORM\JoinColumn(nullable=true)
    * @Expose    
    */
    private $processeur;

        /**
    * @ORM\ManyToOne(targetEntity="IMIE\CoreBundle\Entity\Cm")
    * @ORM\JoinColumn(nullable=true)
    * @Expose    
    */
    private $cm;      

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
     * Set constructeur
     *
     * @param \IMIE\CoreBundle\Entity\Constructeur $constructeur
     * @return TypeMateriel
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
     * Set materiel
     *
     * @param string $materiel
     * @return TypeMateriel
     */
    public function setMateriel($materiel)
    {
        $this->materiel = $materiel;

        return $this;
    }

    /**
     * Get materiel
     *
     * @return string 
     */
    public function getMateriel()
    {
        return $this->materiel;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return TypeMateriel
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return TypeMateriel
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
     * Set vitesse
     *
     * @param integer $vitesse
     * @return TypeMateriel
     */
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get vitesse
     *
     * @return integer 
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Set port
     *
     * @param integer $port
     * @return TypeMateriel
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return integer 
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set ram
     *
     * @param integer $ram
     * @return TypeMateriel
     */
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return integer 
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set disque
     *
     * @param integer $disque
     * @return TypeMateriel
     */
    public function setDisque($disque)
    {
        $this->disque = $disque;

        return $this;
    }

    /**
     * Get disque
     *
     * @return integer 
     */
    public function getDisque()
    {
        return $this->disque;
    }

    /**
     * Set processeur
     *
     * @param \IMIE\CoreBundle\Entity\Processeur $processeur
     * @return TypeMateriel
     */
    public function setProcesseur(\IMIE\CoreBundle\Entity\Processeur $processeur = null)
    {
        $this->processeur = $processeur;

        return $this;
    }

    /**
     * Get processeur
     *
     * @return \IMIE\CoreBundle\Entity\Processeur 
     */
    public function getProcesseur()
    {
        return $this->processeur;
    }

    /**
     * Set cm
     *
     * @param \IMIE\CoreBundle\Entity\Cm $cm
     * @return TypeMateriel
     */
    public function setCm(\IMIE\CoreBundle\Entity\Cm $cm = null)
    {
        $this->cm = $cm;

        return $this;
    }

    /**
     * Get cm
     *
     * @return \IMIE\CoreBundle\Entity\Cm 
     */
    public function getCm()
    {
        return $this->cm;
    }


    public function __toString()
    {
        return "pc";
    }
}
