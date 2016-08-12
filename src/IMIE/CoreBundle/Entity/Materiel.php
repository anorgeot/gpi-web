<?php

namespace IMIE\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Materiel
 *
 * @ORM\Table(name="materiel")
 * @ORM\Entity(repositoryClass="IMIE\CoreBundle\Repository\MaterielRepository")
 * @ExclusionPolicy("all") 
 */
class Materiel
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
     * @ORM\Column(name="numero", type="string")
     * @Expose 
     */
    private $numero;

    /**
    * @ORM\ManyToOne(targetEntity="IMIE\CoreBundle\Entity\TypeMateriel")
    * @ORM\JoinColumn(nullable=false)
    * @Expose 
    */
    private $typeMateriel;

    /**
    * @ORM\ManyToOne(targetEntity="IMIE\CoreBundle\Entity\Salle")
    * @ORM\JoinColumn(nullable=false)
    * @Expose
    */
    private $salle;    

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
     * Set numero
     *
     * @param string $numero
     * @return Materiel
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set TypeMateriel
     *
     * @param \IMIE\CoreBundle\Entity\TypeMateriel $typeMateriel
     * @return Materiel
     */
    public function setTypeMateriel(\IMIE\CoreBundle\Entity\TypeMateriel $typeMateriel)
    {
        $this->typeMateriel = $typeMateriel;

        return $this;
    }

    /**
     * Get TypeMateriel
     *
     * @return \IMIE\CoreBundle\Entity\TypeMateriel 
     */
    public function getTypeMateriel()
    {
        return $this->typeMateriel;
    }

    /**
     * Set Salle
     *
     * @param \IMIE\CoreBundle\Entity\Salle $salle
     * @return Materiel
     */
    public function setSalle(\IMIE\CoreBundle\Entity\Salle $salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get Salle
     *
     * @return \IMIE\CoreBundle\Entity\Salle 
     */
    public function getSalle()
    {
        return $this->salle;
    }


}
