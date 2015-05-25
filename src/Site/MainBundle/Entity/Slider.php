<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site\MainBundle\Entity\Slider
 *
 * @ORM\Table(name="slider")
 * @ORM\Entity(repositoryClass="Site\MainBundle\Repository\SliderRepository")
 */
class Slider
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $img;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text_it;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text_ru;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text_cn;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dark = false;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $link;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $video;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $lang;

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
     * Set img
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $img
     * @return Slider
     */
    public function setImg(\Application\Sonata\MediaBundle\Entity\Media $img = null)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Slider
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Slider
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
     * Set dark
     *
     * @param boolean $dark
     * @return Slider
     */
    public function setDark($dark)
    {
        $this->dark = $dark;

        return $this;
    }

    /**
     * Get dark
     *
     * @return boolean 
     */
    public function getDark()
    {
        return $this->dark;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Slider
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set text_it
     *
     * @param string $textIt
     * @return Slider
     */
    public function setTextIt($textIt)
    {
        $this->text_it = $textIt;

        return $this;
    }

    /**
     * Get text_it
     *
     * @return string 
     */
    public function getTextIt()
    {
        return $this->text_it;
    }

    /**
     * Set text_ru
     *
     * @param string $textRu
     * @return Slider
     */
    public function setTextRu($textRu)
    {
        $this->text_ru = $textRu;

        return $this;
    }

    /**
     * Get text_ru
     *
     * @return string 
     */
    public function getTextRu()
    {
        return $this->text_ru;
    }

    /**
     * Set text_cn
     *
     * @param string $textCn
     * @return Slider
     */
    public function setTextCn($textCn)
    {
        $this->text_cn = $textCn;

        return $this;
    }

    /**
     * Get text_cn
     *
     * @return string 
     */
    public function getTextCn()
    {
        return $this->text_cn;
    }

    /**
     * Set lang
     *
     * @param integer $lang
     * @return Slider
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return integer 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set video
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $video
     * @return Slider
     */
    public function setVideo(\Application\Sonata\MediaBundle\Entity\Media $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getVideo()
    {
        return $this->video;
    }
}
