<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Chas\APIBundle\Repository\TimeTableRepository")
 * @ORM\Table(name="timetablestops")
 */
class TimeTableStops
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length="100")
     */
    protected $title;
    
    /**
     * @ORM\OneToMany(targetEntity="TimeTableRoute", mappedBy="stops")
     */
    protected $routes;

    /**
     * @ORM\Column(type="string", length="10")
     */
    protected $latitude = "";

    /**
     * @ORM\Column(type="string", length="10")
     */
    protected $longitude = "";

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
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Set latitude
     *
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    public function __construct()
    {
        $this->routes = new ArrayCollection();
    }

    /**
     * Set routes
     *
     * @param Chas\APIBundle\Entity\TimeTableRoute $routes
     */
    public function setRoute(\Chas\APIBundle\Entity\TimeTableRoute $routes)
    {
        $this->routes[] = $routes;
    }

    /**
     * Get routes
     *
     * @return Chas\APIBundle\Entity\TimeTableRoute
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
