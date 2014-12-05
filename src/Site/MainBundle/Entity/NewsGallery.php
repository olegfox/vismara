<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Site\MainBundle\Translitor\Translitor;

/**
 * Site\MainBundle\Entity\NewsGallery
 *
 * @ORM\Table(name="news_gallery")
 * @ORM\Entity(repositoryClass="Site\MainBundle\Repository\NewsGalleryRepository")
 */
class NewsGallery
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length = 500)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length = 500)
     */
    private $title_it;

    /**
     * @ORM\Column(type="string", length = 500)
     */
    private $title_ru;

    /**
     * @ORM\Column(type="string", length = 500, nullable = true)
     */
    private $keyword = "";

    /**
     * @ORM\Column(type="string", length = 500, nullable = true)
     */
    private $keyword_it = "";

    /**
     * @ORM\Column(type="string", length = 500, nullable = true)
     */
    private $keyword_ru = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $description = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $description_it = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $description_ru = "";
    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $slug = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $text;

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $text_it;

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $text_ru;

    /**
     * @ORM\OneToMany(targetEntity="Image", cascade={"persist", "remove"}, mappedBy="news", orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $video;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

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
     * @return NewsVideo
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
     * Set title_it
     *
     * @param string $titleIt
     * @return NewsGallery
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
     * Set title_ru
     *
     * @param string $titleRu
     * @return NewsGallery
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
     * Set keyword
     *
     * @param string $keyword
     * @return NewsGallery
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
     * Set keyword_it
     *
     * @param string $keywordIt
     * @return NewsGallery
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
     * @return NewsGallery
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
     * Set description
     *
     * @param string $description
     * @return NewsGallery
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
     * Set description_it
     *
     * @param string $descriptionIt
     * @return NewsGallery
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
     * @return NewsGallery
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
     * Set slug
     *
     * @param string $slug
     * @return NewsGallery
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
     * Set text
     *
     * @param string $text
     * @return NewsGallery
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
     * Set text_it
     *
     * @param string $textIt
     * @return NewsGallery
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
     * @return NewsGallery
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
     * Set created
     *
     * @param \DateTime $created
     * @return NewsGallery
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
     * @return NewsGallery
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
     * @return NewsGallery
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
     * Set video
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $video
     * @return NewsGallery
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
