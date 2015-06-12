<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Site\MainBundle\Translitor\Translitor;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Site\MainBundle\Entity\ColorProduct
 *
 * @ORM\Table(name="color_product")
 * @ORM\Entity(repositoryClass="Site\MainBundle\Entity\Repository\ColorProductRepository")
 */
class ColorProduct
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
    private $description_cn = "";

    /**
     * @ORM\Column(type="text")
     */
    private $filename = "";

    private $file = "";

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="colors")
     * @ORM\JoinColumn(name="id_product",  referencedColumnName="id")
     */
    private $product;

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
     * @return Color
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
     * @return Color
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
     * @return Color
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
     * @return Color
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
     * Set description
     *
     * @param string $description
     * @return Color
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
     * @return Color
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
     * @return Color
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
     * @return Color
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
     * Set filename
     *
     * @param string $filename
     * @return Color
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    public function setFile($file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getAbsolutePath()
    {
        return null === $this->filename ? null : $this->getUploadRootDir().'/'.$this->filename;
    }

    public function getWebPath()
    {
        return null === $this->filename ? null : $this->getUploadDir().'/'.$this->filename;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'colors_product';
    }

    public function upload($basepath)
    {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        if (null === $basepath) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        $filename = uniqid() . '.' . $this->file->guessExtension();

        // move takes the target directory and then the target filename to move to
        $this->file->move($this->getUploadRootDir($basepath), $filename);

        // set the path property to the filename where you'ved saved the file
        $this->setFilename($filename);

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Color
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
     * Set product
     *
     * @param \Site\MainBundle\Entity\Product $product
     * @return Color
     */
    public function setProduct(\Site\MainBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Site\MainBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
