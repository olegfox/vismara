<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="zone_catalogs")
 * @ORM\Entity(repositoryClass="Site\MainBundle\Entity\Repository\ZoneCatalogsRepository")
 */
class ZoneCatalogs
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $passwordText;

    /**
     * @ORM\OneToMany(targetEntity="Catalogs", cascade={"persist"}, mappedBy="zone")
     */
    private $catalogs;

    /**
     * @ORM\OneToMany(targetEntity="Client", cascade={"persist"}, mappedBy="zone")
     */
    private $clients;

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
     * @return ZoneCatalogs
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
     * Set passwordText
     *
     * @param string $passwordText
     * @return ZoneCatalogs
     */
    public function setPasswordText($passwordText)
    {
        $this->passwordText = $passwordText;

        return $this;
    }

    /**
     * Get passwordText
     *
     * @return string 
     */
    public function getPasswordText()
    {
        return $this->passwordText;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->catalogs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add catalogs
     *
     * @param \Site\MainBundle\Entity\Catalogs $catalogs
     * @return ZoneCatalogs
     */
    public function addCatalog(\Site\MainBundle\Entity\Catalogs $catalogs)
    {
        $this->catalogs[] = $catalogs;

        return $this;
    }

    /**
     * Remove catalogs
     *
     * @param \Site\MainBundle\Entity\Catalogs $catalogs
     */
    public function removeCatalog(\Site\MainBundle\Entity\Catalogs $catalogs)
    {
        $this->catalogs->removeElement($catalogs);
    }

    /**
     * Get catalogs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCatalogs()
    {
        return $this->catalogs;
    }

    public function __toString(){
        return $this->name;
    }

    /**
     * Add clients
     *
     * @param \Site\MainBundle\Entity\Client $clients
     * @return ZoneCatalogs
     */
    public function addClient(\Site\MainBundle\Entity\Client $clients)
    {
        $this->clients[] = $clients;

        return $this;
    }

    /**
     * Remove clients
     *
     * @param \Site\MainBundle\Entity\Client $clients
     */
    public function removeClient(\Site\MainBundle\Entity\Client $clients)
    {
        $this->clients->removeElement($clients);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return ZoneCatalogs
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
}
