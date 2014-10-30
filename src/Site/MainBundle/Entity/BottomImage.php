<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site\MainBundle\Entity\BottomImage
 *
 * @ORM\Table(name="bottom_image")
 * @ORM\Entity
 */
class BottomImage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * Set img
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $img
     * @return BottomImage
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
}
