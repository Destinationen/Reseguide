<?php

namespace Chas\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Chas\APIBundle\Repository\APICacheRepository")
 * @ORM\Table(name="apicache")
 */
class APICache
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
    protected $request;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $response;
    
    /**
     * @ORM\Column(type="date")
     */
    protected $createddate;

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
     * Set request
     *
     * @param string $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * Get request
     *
     * @return string 
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set response
     *
     * @param text $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * Get response
     *
     * @return text 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set createddate
     *
     * @param date $createddate
     */
    public function setCreateddate($createddate)
    {
        $this->createddate = $createddate;
    }

    /**
     * Get createddate
     *
     * @return date 
     */
    public function getCreateddate()
    {
        return $this->createddate;
    }
}