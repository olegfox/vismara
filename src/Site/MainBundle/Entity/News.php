<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Site\MainBundle\Translitor\Translitor;

/**
 * Site\MainBundle\Entity\News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News
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
    private $head;

    /**
     * @ORM\Column(type="text")
     */
    private $head_cz;

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $keyword = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $keyword_cz = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $description = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $description_cz = "";

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $slug = "";

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $preview;

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $text;

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    private $text_cz;

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
     * Set head
     *
     * @param string $head
     * @return News
     */
    public function setHead($head)
    {
        $tr = new Translitor();
        $slug = $tr->translitIt($head);
        $this->setSlug($slug);
        $this->head = $head;

        return $this;
    }

    /**
     * Get head
     *
     * @return string 
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return News
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return News
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

    public function __toString()
    {
        return $this->head;
    }


    /**
     * Set head_cz
     *
     * @param string $headCz
     * @return News
     */
    public function setHeadCz($headCz)
    {
        $this->head_cz = $headCz;

        return $this;
    }

    /**
     * Get head_cz
     *
     * @return string 
     */
    public function getHeadCz()
    {
        return $this->head_cz;
    }

    /**
     * Set keyword
     *
     * @param string $keyword
     * @return News
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
     * Set keyword_cz
     *
     * @param string $keywordCz
     * @return News
     */
    public function setKeywordCz($keywordCz)
    {
        $this->keyword_cz = $keywordCz;

        return $this;
    }

    /**
     * Get keyword_cz
     *
     * @return string 
     */
    public function getKeywordCz()
    {
        return $this->keyword_cz;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return News
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
     * Set description_cz
     *
     * @param string $descriptionCz
     * @return News
     */
    public function setDescriptionCz($descriptionCz)
    {
        $this->description_cz = $descriptionCz;

        return $this;
    }

    /**
     * Get description_cz
     *
     * @return string 
     */
    public function getDescriptionCz()
    {
        return $this->description_cz;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return News
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
     * Set text_cz
     *
     * @param string $textCz
     * @return News
     */
    public function setTextCz($textCz)
    {
        $this->text_cz = $textCz;

        return $this;
    }

    /**
     * Get text_cz
     *
     * @return string 
     */
    public function getTextCz()
    {
        return $this->text_cz;
    }

    /**
     * Set preview
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $preview
     * @return News
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
}
