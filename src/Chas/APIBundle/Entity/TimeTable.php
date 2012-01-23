<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="timetable")
 */
class TimeTable
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string", length="25")
     */
    protected $type;
    
    /**
     * @ORM\OneToMany(targetEntity="TimeTableTrips", mappedBy="timetable")
     */
    protected $trips;

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
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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

    public function __construct()
    {
        $this->trips = new ArrayCollection();
    }
    
    /**
     * Add trips
     *
     * @param Chas\APIBundle\Entity\TimeTableTrips $trips
     */
    public function addTimeTableTrips(\Chas\APIBundle\Entity\TimeTableTrips $trips)
    {
        $this->trips[] = $trips;
    }

    /**
     * Get trips
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTrips()
    {
        return $this->trips;
    }
}
