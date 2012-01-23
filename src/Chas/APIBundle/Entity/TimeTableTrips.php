<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Chas\APIBundle\Repository\TimeTableRepository")
 * @ORM\Table(name="timetabletrips")
 */
class TimeTableTrips
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $days = 127;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $redday = 0;

    /**
     * @ORM\Column(type="date")
     */
    protected $availablefrom;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $availableto;
    
    /**
     * @ORM\ManyToOne(targetEntity="TimeTable", inversedBy="trips")
     * @ORM\JoinColumn(name="timetable_id", referencedColumnName="id")
     */
    protected $timetable;
     
    /**
     * @ORM\OneToMany(targetEntity="TimeTableRoute", mappedBy="trips")
     */
    protected $routes;

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
     * Set availablefrom
     *
     * @param date $availablefrom
     */
    public function setAvailablefrom($availablefrom)
    {
        $this->availablefrom = $availablefrom;
    }

    /**
     * Get availablefrom
     *
     * @return date 
     */
    public function getAvailablefrom()
    {
        return $this->availablefrom;
    }

    /**
     * Set availableto
     *
     * @param date $availableto
     */
    public function setAvailableto($availableto)
    {
        $this->availableto = $availableto;
    }

    /**
     * Get availableto
     *
     * @return date 
     */
    public function getAvailableto()
    {
        return $this->availableto;
    }

    /**
     * Set timetable
     *
     * @param Chas\APIBundle\Entity\TimeTable $timetable
     */
    public function setTimetable(\Chas\APIBundle\Entity\TimeTable $timetable)
    {
        $this->timetable = $timetable;
    }

    /**
     * Get timetable
     *
     * @return Chas\APIBundle\Entity\TimeTable 
     */
    public function getTimetable()
    {
        return $this->timetable;
    }

    /**
     * Set days
     *
     * @param integer $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * Get days
     *
     * @return integer 
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set redday
     *
     * @param boolean $redday
     */
    public function setRedday($redday)
    {
        $this->redday = $redday;
    }

    /**
     * Get redday
     *
     * @return boolean 
     */
    public function getRedday()
    {
        return $this->redday;
    }

    public function __construct()
    {
        $this->routes = new ArrayCollection();
    }
    
    /**
     * Add route
     *
     * @param Chas\APIBundle\Entity\TimeTableRoute $route
     */
    public function addRoutes(\Chas\APIBundle\Entity\TimeTableRoute $route)
    {
        $this->routes[] = $route;
    }

    /**
     * Get route
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
