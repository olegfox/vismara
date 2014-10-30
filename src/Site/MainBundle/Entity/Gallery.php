<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Site\MainBundle\Translitor\Translitor;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Site\MainBundle\Entity\Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity
 */
class Gallery
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
    private $title = "";

    /**
     * @ORM\Column(type="text")
     */
    private $title_it = "";

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $titleImg;

    /**
     * @ORM\Column(type="boolean")
     */
    private $showTitleImg = false;

    /**
     * @ORM\Column(type="text")
     */
    private $description = "";

    /**
     * @ORM\Column(type="text")
     */
    private $description_it = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $slug = "";

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $preview;

    /**
     * @ORM\OneToMany(targetEntity="Image", cascade={"persist", "remove"}, mappedBy="gallery", orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $background;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="text")
     */
    private $text_it;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bgShow = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hideTitle = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hideDark = false;

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
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Gallery
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
     * Set created
     *
     * @param \DateTime $created
     * @return Gallery
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Gallery
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add images
     *
     * @param \Site\MainBundle\Entity\Image $images
     * @return Gallery
     */
    public function addImage(\Site\MainBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Site\MainBundle\Entity\Image $images
     */
    public function removeImage(\Site\MainBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    public function getGallery()
    {
        return $this->images;
    }

    public function setGallery()
    {

        return $this;
    }

    /**
     * Set preview
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $preview
     * @return Gallery
     */
    public function setPreview(\Application\Sonata\MediaBundle\Entity\Media $preview = null)
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * Get preview
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Gallery
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
     * Set background
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $background
     * @return Gallery
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
     * Set description
     *
     * @param string $description
     * @return Gallery
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
     * Set position
     *
     * @param integer $position
     * @return Gallery
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
     * Set bgShow
     *
     * @param boolean $bgShow
     * @return Gallery
     */
    public function setBgShow($bgShow)
    {
        $this->bgShow = $bgShow;

        return $this;
    }

    /**
     * Get bgShow
     *
     * @return boolean 
     */
    public function getBgShow()
    {
        return $this->bgShow;
    }

    /**
     * Set hideDark
     *
     * @param boolean $hideDark
     * @return Gallery
     */
    public function setHideDark($hideDark)
    {
        $this->hideDark = $hideDark;

        return $this;
    }

    /**
     * Get hideDark
     *
     * @return boolean 
     */
    public function getHideDark()
    {
        return $this->hideDark;
    }

    /**
     * Set hideTitle
     *
     * @param boolean $hideTitle
     * @return Gallery
     */
    public function setHideTitle($hideTitle)
    {
        $this->hideTitle = $hideTitle;

        return $this;
    }

    /**
     * Get hideTitle
     *
     * @return boolean 
     */
    public function getHideTitle()
    {
        return $this->hideTitle;
    }

    /**
     * Set showTitleImg
     *
     * @param boolean $showTitleImg
     * @return Gallery
     */
    public function setShowTitleImg($showTitleImg)
    {
        $this->showTitleImg = $showTitleImg;

        return $this;
    }

    /**
     * Get showTitleImg
     *
     * @return boolean 
     */
    public function getShowTitleImg()
    {
        return $this->showTitleImg;
    }

    /**
     * Set titleImg
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $titleImg
     * @return Gallery
     */
    public function setTitleImg(\Application\Sonata\MediaBundle\Entity\Media $titleImg = null)
    {
        $this->titleImg = $titleImg;

        return $this;
    }

    /**
     * Get titleImg
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getTitleImg()
    {
        return $this->titleImg;
    }

    /**
     * Set dark
     *
     * @param boolean $dark
     * @return Gallery
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
     * @return Gallery
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
     * Set description_it
     *
     * @param string $descriptionIt
     * @return Gallery
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
     * Set text_it
     *
     * @param string $textIt
     * @return Gallery
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
}
