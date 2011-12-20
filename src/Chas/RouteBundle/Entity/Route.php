<?php

namespace Chas\RouteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Chas\RouteBundle\Entity\Route
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chas\RouteBundle\Repository\RouteRepository")
 */
class Route
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
     * @ORM\Column(type="string", length="255")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    
    /**
     * @ORM\OneToMany(targetEntity="RouteLocation", mappedBy="route")
     */
    protected $routelocations;
   
    /**
     * @ORM\Column(type="boolean")
     */
    protected $isStop;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;
    
    public function __construct()
    {
        $this->routelocations = new ArrayCollection();
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
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isStop
     *
     * @param boolean $isStop
     */
    public function setIsStop($isStop)
    {
        $this->isStop = $isStop;
    }

    /**
     * Get isStop
     *
     * @return boolean 
     */
    public function getIsStop()
    {
        return $this->isStop;
    }

    /**
     * Add routelocations
     *
     * @param Chas\RouteBundle\Entity\RouteLocation $routelocations
     */
    public function addRouteLocation(\Chas\RouteBundle\Entity\RouteLocation $routelocations)
    {
        $this->routelocations[] = $routelocations;
    }

    /**
     * Get routelocations
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRoutelocations()
    {
        return $this->routelocations;
    }
}