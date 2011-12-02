<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
    protected $stop;
    
    /**
     * @ORM\Column(type="time")
     */
    protected $departure;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $availablefrom;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $availableto;
    
    /**
     * @ORM\ManyToOne(targetEntity="TimeTable", inversedBy="stops")
     * @ORM\JoinColumn(name="timetable_id", referencedColumnName="id")
     */
    protected $timetable;


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
     * Set stop
     *
     * @param string $stop
     */
    public function setStop($stop)
    {
        $this->stop = $stop;
    }

    /**
     * Get stop
     *
     * @return string 
     */
    public function getStop()
    {
        return $this->stop;
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
}