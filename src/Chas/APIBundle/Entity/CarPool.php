<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Chas\APIBundle\Repository\CarPoolRepository")
 * @ORM\Table(name="carpool")
 */
class CarPool
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $departure;
    
    /**
     * @ORM\ManyToOne(targetEntity="Destination", inversedBy="carpool")
     * @ORM\JoinColumn(name="destination_id", referencedColumnName="id")
     */
    protected $destination;

    /**
     * @ORM\Column(type="date")
     */
    protected $date_from;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $seats;

    /**
     * @ORM\Column(type="string", length="150")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length="150")
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string", length="13")
     */
    protected $phonenumber;


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
     * Set date_from
     *
     * @param date $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->date_from = $dateFrom;
    }

    /**
     * Get date_from
     *
     * @return date 
     */
    public function getDateFrom()
    {
        return $this->date_from;
    }

    /**
     * Set seats
     *
     * @param integer $seats
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    /**
     * Get seats
     *
     * @return integer 
     */
    public function getSeats()
    {
        return $this->seats;
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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phonenumber
     *
     * @param string $phonenumber
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }

    /**
     * Get phonenumber
     *
     * @return string 
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set departure
     *
     * @param string $departure
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    }

    /**
     * Get departure
     *
     * @return string 
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set destination
     *
     * @param Chas\APIBundle\Entity\Destination $destination
     */
    public function setDestination(\Chas\APIBundle\Entity\Destination $destination)
    {
        $this->destination = $destination;
    }

    /**
     * Get destination
     *
     * @return Chas\APIBundle\Entity\Destination 
     */
    public function getDestination()
    {
        return $this->destination;
    }
}