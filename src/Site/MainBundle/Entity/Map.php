<?php 
namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="map")
 */
class Map
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $name_it;

    /**
     * @ORM\Column(type="text")
     */
    protected $name_ru;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $phone; 

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $text;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $text_it;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $text_ru;

    /**
     * @ORM\Column(type="text")
     */
    protected $coord;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $img;

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
     * @return Map
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
     * Set phone
     *
     * @param string $phone
     * @return Map
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Map
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
     * Set coord
     *
     * @param string $coord
     * @return Map
     */
    public function setCoord($coord)
    {
        $this->coord = $coord;

        return $this;
    }

    /**
     * Get coord
     *
     * @return string 
     */
    public function getCoord()
    {
        return $this->coord;
    }

    public function getX(){
        $explode = explode(',', $this->coord);
        return $explode[1];
    }

    public function getY(){
        $explode = explode(',', $this->coord);
        return $explode[0];
    }

    /**
     * Set img
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $img
     * @return Map
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
     * Set name_it
     *
     * @param string $nameIt
     * @return Map
     */
    public function setNameIt($nameIt)
    {
        $this->name_it = $nameIt;

        return $this;
    }

    /**
     * Get name_it
     *
     * @return string 
     */
    public function getNameIt()
    {
        return $this->name_it;
    }

    /**
     * Set text_it
     *
     * @param string $textIt
     * @return Map
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
     * Set name_ru
     *
     * @param string $nameRu
     * @return Map
     */
    public function setNameRu($nameRu)
    {
        $this->name_ru = $nameRu;

        return $this;
    }

    /**
     * Get name_ru
     *
     * @return string 
     */
    public function getNameRu()
    {
        return $this->name_ru;
    }

    /**
     * Set text_ru
     *
     * @param string $textRu
     * @return Map
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
}
