<?php

namespace Chas\RouteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chas\RouteBundle\Entity\RouteLocation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RouteLocation
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
     * @ORM\ManyToOne(targetEntity="Route", inversedBy="routelocations")
     * @ORM\JoinColumn(name="route_id", referencedColumnName="id")
     */
    protected $route;
    
    /**
     * @ORM\Column(type="string", length="10")
     */
    protected $lat;

    /**
     * @ORM\Column(type="string", length="10")
     */
    protected $lon;

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
     * Set lat
     *
     * @param string $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param string $lon
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
    }

    /**
     * Get lon
     *
     * @return string 
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set route
     *
     * @param Chas\RouteBundle\Entity\Route $route
     */
    public function setRoute(\Chas\RouteBundle\Entity\Route $route)
    {
        $this->route = $route;
    }

    /**
     * Get route
     *
     * @return Chas\RouteBundle\Entity\Route 
     */
    public function getRoute()
    {
        return $this->route;
    }
}