<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site\MainBundle\Entity\Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity
 */
class Video
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
    private $title_cn;

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
     * @ORM\Column(type="text")
     */
    private $description_cn;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $value;


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
     * @return Video
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
     * Set value
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $value
     * @return Video
     */
    public function setValue(\Application\Sonata\MediaBundle\Entity\Media $value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set title_it
     *
     * @param string $titleIt
     * @return Video
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
     * @return Video
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
     * Set description
     *
     * @param string $description
     * @return Video
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
     * @return Video
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
     * @return Video
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
     * Set title_cn
     *
     * @param string $titleCn
     * @return Video
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
     * @return Video
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
}
