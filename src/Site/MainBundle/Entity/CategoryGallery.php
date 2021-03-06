<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Site\MainBundle\Translitor\Translitor;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Site\MainBundle\Entity\CategoryGallery
 *
 * @ORM\Table(name="category_gallery")
 * @ORM\Entity
 */
class CategoryGallery
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
     * @ORM\Column(type="text", nullable = true)
     */
    private $slug = "";

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $preview;

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
     * @ORM\OneToMany(targetEntity="Product", cascade={"persist"}, mappedBy="category")
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
     * Set title_it
     *
     * @param string $titleIt
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * Set slug
     *
     * @param string $slug
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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

    public function __toString(){
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add products
     *
     * @param \Site\MainBundle\Entity\Product $products
     * @return CategoryGallery
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

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
     * @return CategoryGallery
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
