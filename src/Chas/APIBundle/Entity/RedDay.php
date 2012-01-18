<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="redday")
 */
class RedDay
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
    protected $name;

    /**
     * @ORM\Column(type="date")
     */
    protected $day;
    
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
     * Get day
     *
     * @return datetime 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set day
     *
     * @param date $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }
}
