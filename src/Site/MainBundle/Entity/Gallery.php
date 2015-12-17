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
     * @ORM\Column(type="text")
     */
    private $title_ru = "";

    /**
     * @ORM\Column(type="text")
     */
    private $title_cn = "";

    /**
     * @ORM\Column(type="text")
     */
    private $metaTitle;

    /**
     * @ORM\Column(type="text")
     */
    private $metaTitle_it;

    /**
     * @ORM\Column(type="text")
     */
    private $metaTitle_ru;

    /**
     * @ORM\Column(type="text")
     */
    private $metaTitle_cn;

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
    private $keyword_cn;

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
     * @ORM\Column(type="text")
     */
    private $description_ru = "";

    /**
     * @ORM\Column(type="text")
     */
    private $description_cn = "";

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
     * @ORM\OrderBy({"position" = "ASC"})
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
     * @ORM\Column(type="text")
     */
    private $text_ru;

    /**
     * @ORM\Column(type="text")
     */
    private $text_cn;

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
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $collectionImage;

    /**
     * @ORM\OneToMany(targetEntity="Product", cascade={"persist"}, mappedBy="gallery")
     */
    private $products;

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

    /**
     * Set title_ru
     *
     * @param string $titleRu
     * @return Gallery
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
     * Set description_ru
     *
     * @param string $descriptionRu
     * @return Gallery
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
     * Set text_ru
     *
     * @param string $textRu
     * @return Gallery
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
     * Set keyword
     *
     * @param string $keyword
     * @return Gallery
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
     * @return Gallery
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
     * @return Gallery
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
     * Set title_cn
     *
     * @param string $titleCn
     * @return Gallery
     */
    public function setTitleCn($titleCn)
    {
        $this->title_cn = $titleCn;

        return $this;
    }

    /**
     * Get title_cn
     *
     * @return string 
     */
    public function getTitleCn()
    {
        return $this->title_cn;
    }

    /**
     * Set keyword_cn
     *
     * @param string $keywordCn
     * @return Gallery
     */
    public function setKeywordCn($keywordCn)
    {
        $this->keyword_cn = $keywordCn;

        return $this;
    }

    /**
     * Get keyword_cn
     *
     * @return string 
     */
    public function getKeywordCn()
    {
        return $this->keyword_cn;
    }

    /**
     * Set description_cn
     *
     * @param string $descriptionCn
     * @return Gallery
     */
    public function setDescriptionCn($descriptionCn)
    {
        $this->description_cn = $descriptionCn;

        return $this;
    }

    /**
     * Get description_cn
     *
     * @return string 
     */
    public function getDescriptionCn()
    {
        return $this->description_cn;
    }

    /**
     * Set text_cn
     *
     * @param string $textCn
     * @return Gallery
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
     * Set collectionImage
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $collectionImage
     * @return Gallery
     */
    public function setCollectionImage(\Application\Sonata\MediaBundle\Entity\Media $collectionImage = null)
    {
        $this->collectionImage = $collectionImage;

        return $this;
    }

    /**
     * Get collectionImage
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getCollectionImage()
    {
        return $this->collectionImage;
    }

    /**
     * Add products
     *
     * @param \Site\MainBundle\Entity\Product $products
     * @return Gallery
     */
    public function addProduct(\Site\MainBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Site\MainBundle\Entity\Product $products
     */
    public function removeProduct(\Site\MainBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function __toString(){
        return $this->title;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return Gallery
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set metaTitle_it
     *
     * @param string $metaTitleIt
     * @return Gallery
     */
    public function setMetaTitleIt($metaTitleIt)
    {
        $this->metaTitle_it = $metaTitleIt;

        return $this;
    }

    /**
     * Get metaTitle_it
     *
     * @return string 
     */
    public function getMetaTitleIt()
    {
        return $this->metaTitle_it;
    }

    /**
     * Set metaTitle_ru
     *
     * @param string $metaTitleRu
     * @return Gallery
     */
    public function setMetaTitleRu($metaTitleRu)
    {
        $this->metaTitle_ru = $metaTitleRu;

        return $this;
    }

    /**
     * Get metaTitle_ru
     *
     * @return string 
     */
    public function getMetaTitleRu()
    {
        return $this->metaTitle_ru;
    }

    /**
     * Set metaTitle_cn
     *
     * @param string $metaTitleCn
     * @return Gallery
     */
    public function setMetaTitleCn($metaTitleCn)
    {
        $this->metaTitle_cn = $metaTitleCn;

        return $this;
    }

    /**
     * Get metaTitle_cn
     *
     * @return string 
     */
    public function getMetaTitleCn()
    {
        return $this->metaTitle_cn;
    }
}
