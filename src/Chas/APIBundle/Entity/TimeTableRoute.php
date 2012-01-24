<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="timetableroute")
 */
class TimeTableRoute
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
     * @ORM\Column(type="integer") 
     */
    protected $routeorder; 
   
    /**
     * @ORM\Column(type="time")
     */
    protected $departure;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $endstation = 0;

    /**
     * @ORM\ManyToOne(targetEntity="TimeTableTrips", inversedBy="routes")
     * @ORM\JoinColumn(name="timetabletrips_id", referencedColumnName="id")
     */
    protected $trips;
    
    /**
     * @ORM\ManyToOne(targetEntity="TimeTableStops", inversedBy="routes")
     * @ORM\JoinColumn(name="timetabletstops_id", referencedColumnName="id")
     */
    protected $stops;
    
    public function __construct()
    {
        //$this->stops = new ArrayCollection();
        //$this->trips = new ArrayCollection();
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
     * Set departure
     *
     * @param datetime $departure
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    }

    /**
     * Get departure
     *
     * @return datetime 
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set routeorder
     *
     * @param integer $routeorder
     */
    public function setRouteorder($routeorder)
    {
        $this->routeorder = $routeorder;
    }

    /**
     * Get routeorder
     *
     * @return integer 
     */
    public function getRouteorder()
    {
        return $this->routeorder;
    }

    /**
     * Set endstation
     *
     * @param boolean $endstation
     */
    public function setEndstation($endstation)
    {
        $this->endstation = $endstation;
    }

    /**
     * Get endstation
     *
     * @return boolean 
     */
    public function getEndstation()
    {
        return $this->endstation;
    }

    /**
     * Add trips
     *
     * @param Chas\APIBundle\Entity\TimeTableTrips $trips
     */
    public function addTrips(\Chas\APIBundle\Entity\TimeTableTrips $trips)
    {
        $this->trips = $trips;
    }

    /**
     * Get trips
     *
     * @return Chas\APIBundle\Entity\TimeTableTrips 
     */
    public function getTrips()
    {
        return $this->trips;
    }

    /**
     * Add stops
     *
     * @param Chas\APIBundle\Entity\TimeTableStops $stops
     */
    public function addStops(\Chas\APIBundle\Entity\TimeTableStops $stops)
    {
        $this->stops = $stops;
    }

    /**
     * Get stops
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getStops()
    {
        return $this->stops;
    }
}
