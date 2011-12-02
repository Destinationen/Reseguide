<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Chas\APIBundle\Entity\Destination
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Destination
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="CarPool", mappedBy="destination")
     */
    protected $carpool;

    public function __construct()
    {
        $this->carpool = new ArrayCollection();
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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Add carpool
     *
     * @param Chas\APIBundle\Entity\CarPool $carpool
     */
    public function addCarPool(\Chas\APIBundle\Entity\CarPool $carpool)
    {
        $this->carpool[] = $carpool;
    }

    /**
     * Get carpool
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCarpool()
    {
        return $this->carpool;
    }
}