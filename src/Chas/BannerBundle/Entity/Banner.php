<?php

namespace Chas\BannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Chas\BannerBundle\Entity\Banner
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chas\BannerBundle\Repository\BannerRepository")
 */
class Banner
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * @var integer $clicks
     *
     * @ORM\Column(name="clicks", type="integer")
     */
    private $clicks;

    /**
     * @ORM\Column(type="date")
     */
    private $pubdate;

    /**
     * @ORM\Column(type="date")
     */
    private $unpubdate;

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
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set clicks
     *
     * @param integer $clicks
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;
    }

    /**
     * Get clicks
     *
     * @return integer
     */
    public function getClicks()
    {
        return $this->clicks;
    }


    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;

    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // The absolute dir path where uploaded documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doen't screw when displaying uploaded doc/image in the view.
        return 'uploads/banners';
    }

    public function upload()
    {
        if (null === $this->file){
            return;
        }
        
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        
        $this->path = $this->file->getClientOriginalName();

        $this->file = null;

    }


    /**
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set pubdate
     *
     * @param date $pubdate
     */
    public function setPubdate($pubdate)
    {
        $this->pubdate = $pubdate;
    }

    /**
     * Get pubdate
     *
     * @return date 
     */
    public function getPubdate()
    {
        return $this->pubdate;
    }

    /**
     * Set unpubdate
     *
     * @param date $unpubdate
     */
    public function setUnpubdate($unpubdate)
    {
        $this->unpubdate = $unpubdate;
    }

    /**
     * Get unpubdate
     *
     * @return date 
     */
    public function getUnpubdate()
    {
        return $this->unpubdate;
    }
}
