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
     * @ORM\ManyToOne(targetEntity="NewsGalleryIt", inversedBy="images")
     * @ORM\JoinColumn(name="id_news_it",  referencedColumnName="id")
     */
    private $newsIt;

    /**
     * @ORM\ManyToOne(targetEntity="NewsGalleryRu", inversedBy="images")
     * @ORM\JoinColumn(name="id_news_ru",  referencedColumnName="id")
     */
    private $newsRu;

    /**
     * @ORM\ManyToOne(targetEntity="NewsGalleryCn", inversedBy="images")
     * @ORM\JoinColumn(name="id_news_cn",  referencedColumnName="id")
     */
    private $newsCn;

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

    /**
     * Set newsIt
     *
     * @param \Site\MainBundle\Entity\NewsGalleryIt $newsIt
     * @return Image
     */
    public function setNewsIt(\Site\MainBundle\Entity\NewsGalleryIt $newsIt = null)
    {
        $this->newsIt = $newsIt;

        return $this;
    }

    /**
     * Get newsIt
     *
     * @return \Site\MainBundle\Entity\NewsGalleryIt
     */
    public function getNewsIt()
    {
        return $this->newsIt;
    }

    /**
     * Set newsRu
     *
     * @param \Site\MainBundle\Entity\NewsGalleryIt $newsRu
     * @return Image
     */
    public function setNewsRu(\Site\MainBundle\Entity\NewsGalleryRu $newsRu = null)
    {
        $this->newsRu = $newsRu;

        return $this;
    }

    /**
     * Get newsRu
     *
     * @return \Site\MainBundle\Entity\NewsGalleryRu
     */
    public function getNewsRu()
    {
        return $this->newsRu;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Image
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
     * Set title
     *
     * @param string $title
     * @return Image
     */
    public function setTitle($title)
    {
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
     * @return Image
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
     * @return Image
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
     * Set description_it
     *
     * @param string $descriptionIt
     * @return Image
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
     * @return Image
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

    public function getTitleLocale($locale){
        switch($locale){
            case 'en':{
                return $this->getTitle();
            }break;
            case 'it':{
                return $this->getTitleIt();
            }break;
            case 'ru':{
                return $this->getTitleRu();
            }break;
            case 'cn':{
                return $this->getTitleCn();
            }break;
            default:{
                return $this->getTitle();
            }
        }
    }

    public function getDescriptionLocale($locale){
        switch($locale){
            case 'en':{
                return $this->getDescription();
            }break;
            case 'it':{
                return $this->getDescriptionIt();
            }break;
            case 'ru':{
                return $this->getDescriptionRu();
            }break;
            case 'cn':{
                return $this->getDescriptionCn();
            }break;
            default:{
                return $this->getDescription();
            }
        }
    }

    /**
     * Set title_cn
     *
     * @param string $titleCn
     * @return Image
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
     * Set description_cn
     *
     * @param string $descriptionCn
     * @return Image
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
     * Set newsCn
     *
     * @param \Site\MainBundle\Entity\NewsGalleryCn $newsCn
     * @return Image
     */
    public function setNewsCn(\Site\MainBundle\Entity\NewsGalleryCn $newsCn = null)
    {
        $this->newsCn = $newsCn;

        return $this;
    }

    /**
     * Get newsCn
     *
     * @return \Site\MainBundle\Entity\NewsGalleryCn 
     */
    public function getNewsCn()
    {
        return $this->newsCn;
    }
}
