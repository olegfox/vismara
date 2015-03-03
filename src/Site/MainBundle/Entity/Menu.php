<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Site\MainBundle\Translitor\Translitor;

/**
 * Site\MainBundle\Entity\Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity
 */
class Menu
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $title_it;

    /**
     * @ORM\Column(type="text")
     */
    private $title_ru;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="text")
     */
    private $text_it;

    /**
     * @ORM\Column(type="text")
     */
    private $text_ru;

    /**
     * @ORM\Column(type="text")
     */
    private $keyword;

    /**
     * @ORM\Column(type="text")
     */
    private $keyword_it;

    /**
     * @ORM\Column(type="text")
     */
    private $keyword_ru;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $description_it;

    /**
     * @ORM\Column(type="text")
     */
    private $description_ru;

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $slug = "";

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $background;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $background2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dark = false;

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
     * Set text
     *
     * @param string $text
     * @return Menu
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
     * Set title
     *
     * @param string $title
     * @return Menu
     */
    public function setTitle($title)
    {
        $tr = new Translitor();
        $slug = $tr->translitIt($title);
        $this->setSlug($slug);
        $this->title = $title;

        return $this;
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
     * Set slug
     *
     * @param string $slug
     * @return Menu
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set background
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $background
     * @return Menu
     */
    public function setBackground(\Application\Sonata\MediaBundle\Entity\Media $background = null)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Menu
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
     * @return Menu
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
     * Set title_it
     *
     * @param string $titleIt
     * @return Menu
     */
    public function setTitleIt($titleIt)
    {
        $this->title_it = $titleIt;

        return $this;
    }

    /**
     * Get title_it
     *
     * @return string 
     */
    public function getTitleIt()
    {
        return $this->title_it;
    }

    /**
     * Set text_it
     *
     * @param string $textIt
     * @return Menu
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
     * Set title_ru
     *
     * @param string $titleRu
     * @return Menu
     */
    public function setTitleRu($titleRu)
    {
        $this->title_ru = $titleRu;

        return $this;
    }

    /**
     * Get title_ru
     *
     * @return string 
     */
    public function getTitleRu()
    {
        return $this->title_ru;
    }

    /**
     * Set text_ru
     *
     * @param string $textRu
     * @return Menu
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
     * Set keyword_it
     *
     * @param string $keywordIt
     * @return Menu
     */
    public function setKeywordIt($keywordIt)
    {
        $this->keyword_it = $keywordIt;

        return $this;
    }

    /**
     * Get keyword_it
     *
     * @return string 
     */
    public function getKeywordIt()
    {
        return $this->keyword_it;
    }

    /**
     * Set keyword_ru
     *
     * @param string $keywordRu
     * @return Menu
     */
    public function setKeywordRu($keywordRu)
    {
        $this->keyword_ru = $keywordRu;

        return $this;
    }

    /**
     * Get keyword_ru
     *
     * @return string 
     */
    public function getKeywordRu()
    {
        return $this->keyword_ru;
    }

    /**
     * Set description_it
     *
     * @param string $descriptionIt
     * @return Menu
     */
    public function setDescriptionIt($descriptionIt)
    {
        $this->description_it = $descriptionIt;

        return $this;
    }

    /**
     * Get description_it
     *
     * @return string 
     */
    public function getDescriptionIt()
    {
        return $this->description_it;
    }

    /**
     * Set description_ru
     *
     * @param string $descriptionRu
     * @return Menu
     */
    public function setDescriptionRu($descriptionRu)
    {
        $this->description_ru = $descriptionRu;

        return $this;
    }

    /**
     * Get description_ru
     *
     * @return string 
     */
    public function getDescriptionRu()
    {
        return $this->description_ru;
    }

    /**
     * Set keyword
     *
     * @param string $keyword
     * @return Menu
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Menu
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set background2
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $background2
     * @return Menu
     */
    public function setBackground2(\Application\Sonata\MediaBundle\Entity\Media $background2 = null)
    {
        $this->background2 = $background2;

        return $this;
    }

    /**
     * Get background2
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getBackground2()
    {
        return $this->background2;
    }
}
