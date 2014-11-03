<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Site\MainBundle\Translitor\Translitor;

/**
 * Site\MainBundle\Entity\Image
 *
 * @ORM\Table(name="images")
 * @ORM\Entity
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $mimeType;

    /**
     * @ORM\Column(type="text")
     */
    private $src;

    /**
     * @ORM\Column(type="text")
     */
    private $minSrc;

    /**
     * @ORM\ManyToOne(targetEntity="Gallery", inversedBy="images")
     * @ORM\JoinColumn(name="id_gallery",  referencedColumnName="id")
     */
    private $gallery;

    /**
     * @ORM\ManyToOne(targetEntity="NewsGallery", inversedBy="images")
     * @ORM\JoinColumn(name="id_news",  referencedColumnName="id")
     */
    private $news;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

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
     * @return Image
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set mimeType
     *
     * @param string $mimeType
     * @return Image
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string 
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set src
     *
     * @param string $src
     * @return Image
     */
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string 
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set minSrc
     *
     * @param string $minSrc
     * @return Image
     */
    public function setMinSrc($minSrc)
    {
        $this->minSrc = $minSrc;

        return $this;
    }

    /**
     * Get minSrc
     *
     * @return string 
     */
    public function getMinSrc()
    {
        return $this->minSrc;
    }

    /**
     * Set gallery
     *
     * @param \Site\MainBundle\Entity\Gallery $gallery
     * @return Image
     */
    public function setGallery(\Site\MainBundle\Entity\Gallery $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return \Site\MainBundle\Entity\Gallery 
     */
    public function getGallery()
    {
        return $this->gallery;
    }


    /**
     * Set position
     *
     * @param integer $position
     * @return Image
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set news
     *
     * @param \Site\MainBundle\Entity\NewsGallery $news
     * @return Image
     */
    public function setNews(\Site\MainBundle\Entity\NewsGallery $news = null)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \Site\MainBundle\Entity\NewsGallery 
     */
    public function getNews()
    {
        return $this->news;
    }
}
