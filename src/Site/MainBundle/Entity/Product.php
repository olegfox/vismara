<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Site\MainBundle\Translitor\Translitor;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Site\MainBundle\Entity\Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Site\MainBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $keyword;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $keyword_it;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $keyword_ru;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $keyword_cn;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description = "";

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_it = "";

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_ru = "";

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_cn = "";

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
     * @ORM\Column(type="text", nullable = true)
     */
    private $slug = "";

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $preview;

    /**
     * @ORM\OneToMany(targetEntity="Image", cascade={"persist", "remove"}, mappedBy="product", orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $images;

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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="CategoryGallery", inversedBy="products")
     * @ORM\JoinColumn(name="id_category",  referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="StyleGallery", inversedBy="products")
     * @ORM\JoinColumn(name="id_style",  referencedColumnName="id")
     */
    private $style;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $size_it;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $size_ru;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $size_cn;

    /**
     * @ORM\OneToMany(targetEntity="ColorProduct", cascade={"persist", "remove"}, mappedBy="product", orphanRemoval=true)
     */
    private $colors;

    /**
     * @ORM\ManyToOne(targetEntity="Gallery", inversedBy="products")
     * @ORM\JoinColumn(name="id_gallery",  referencedColumnName="id")
     */
    private $collection;

    /**
     * Set title
     *
     * @param string $title
     * @return CategoryGallery
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title_it
     *
     * @param string $titleIt
     * @return Product
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
     * @return Product
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
     * Set title_cn
     *
     * @param string $titleCn
     * @return Product
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
     * Set keyword
     *
     * @param string $keyword
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Set keyword_cn
     *
     * @param string $keywordCn
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Set description_cn
     *
     * @param string $descriptionCn
     * @return Product
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
     * Set slug
     *
     * @param string $slug
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Set position
     *
     * @param integer $position
     * @return Product
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
     * Set preview
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $preview
     * @return Product
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
     * Set category
     *
     * @param \Site\MainBundle\Entity\CategoryGallery $category
     * @return Product
     */
    public function setCategory(\Site\MainBundle\Entity\CategoryGallery $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Site\MainBundle\Entity\CategoryGallery 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set style
     *
     * @param \Site\MainBundle\Entity\StyleGallery $style
     * @return Product
     */
    public function setStyle(\Site\MainBundle\Entity\StyleGallery $style = null)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return \Site\MainBundle\Entity\StyleGallery 
     */
    public function getStyle()
    {
        return $this->style;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Add images
     *
     * @param \Site\MainBundle\Entity\Image $images
     * @return Product
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
     * Set size
     *
     * @param string $size
     * @return Product
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set size_it
     *
     * @param string $sizeIt
     * @return Product
     */
    public function setSizeIt($sizeIt)
    {
        $this->size_it = $sizeIt;

        return $this;
    }

    /**
     * Get size_it
     *
     * @return string 
     */
    public function getSizeIt()
    {
        return $this->size_it;
    }

    /**
     * Set size_ru
     *
     * @param string $sizeRu
     * @return Product
     */
    public function setSizeRu($sizeRu)
    {
        $this->size_ru = $sizeRu;

        return $this;
    }

    /**
     * Get size_ru
     *
     * @return string 
     */
    public function getSizeRu()
    {
        return $this->size_ru;
    }

    /**
     * Set size_cn
     *
     * @param string $sizeCn
     * @return Product
     */
    public function setSizeCn($sizeCn)
    {
        $this->size_cn = $sizeCn;

        return $this;
    }

    /**
     * Get size_cn
     *
     * @return string 
     */
    public function getSizeCn()
    {
        return $this->size_cn;
    }


    /**
     * Add colors
     *
     * @param \Site\MainBundle\Entity\ColorProduct $colors
     * @return Product
     */
    public function addColor(\Site\MainBundle\Entity\ColorProduct $colors)
    {
        $this->colors[] = $colors;

        return $this;
    }

    /**
     * Remove colors
     *
     * @param \Site\MainBundle\Entity\ColorProduct $colors
     */
    public function removeColor(\Site\MainBundle\Entity\ColorProduct $colors)
    {
        $this->colors->removeElement($colors);
    }

    /**
     * Get colors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Set collection
     *
     * @param \Site\MainBundle\Entity\Gallery $collection
     * @return Product
     */
    public function setCollection(\Site\MainBundle\Entity\Gallery $collection = null)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return \Site\MainBundle\Entity\Gallery 
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
