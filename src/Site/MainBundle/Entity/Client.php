<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="Site\MainBundle\Entity\Repository\ClientRepository")
 */
class Client implements UserInterface, \Serializable
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
    private $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255
     * )
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $company_name;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255
     * )
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $contact_name;

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    protected $your_task;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255
     * )
     * @ORM\Column(type="text", nullable = false)
     */
    protected $company_field;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255
     * )
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $country;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255
     * )
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $city;

    /**
     * @ORM\Column(type="text", nullable = true)
     */
    protected $address;

    /**
     * @Assert\Email
     * @ORM\Column(type="string", length = 100, nullable = false)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length = 100, nullable = true)
     */
    protected $website;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="text", nullable = false)
     */
    protected $text;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $passwordText;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salt;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="ZoneCatalogs", inversedBy="client")
     * @ORM\JoinColumn(name="id_zone",  referencedColumnName="id")
     */
    private $zone;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $locale;

    public function __construct()
    {
        $this->isActive = false;
        $this->salt = md5(uniqid(null, true));
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->salt
            ) = unserialize($serialized);
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
     * Set username
     *
     * @param string $username
     * @return Client
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Client
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Client
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Client
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Client
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Client
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
     * Set company_name
     *
     * @param string $companyName
     * @return Client
     */
    public function setCompanyName($companyName)
    {
        $this->company_name = $companyName;

        return $this;
    }

    /**
     * Get company_name
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * Set contact_name
     *
     * @param string $contactName
     * @return Client
     */
    public function setContactName($contactName)
    {
        $this->contact_name = $contactName;

        return $this;
    }

    /**
     * Get contact_name
     *
     * @return string 
     */
    public function getContactName()
    {
        return $this->contact_name;
    }

    /**
     * Set your_task
     *
     * @param string $yourTask
     * @return Client
     */
    public function setYourTask($yourTask)
    {
        $this->your_task = $yourTask;

        return $this;
    }

    /**
     * Get your_task
     *
     * @return string 
     */
    public function getYourTask()
    {
        return $this->your_task;
    }

    /**
     * Set company_field
     *
     * @param string $companyField
     * @return Client
     */
    public function setCompanyField($companyField)
    {
        $this->company_field = $companyField;

        return $this;
    }

    /**
     * Get company_field
     *
     * @return string 
     */
    public function getCompanyField()
    {
        return $this->company_field;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Client
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Client
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Client
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Client
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Client
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
     * Set passwordText
     *
     * @param string $passwordText
     * @return Client
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
     * Set zone
     *
     * @param \Site\MainBundle\Entity\ZoneCatalogs $zone
     * @return Client
     */
    public function setZone(\Site\MainBundle\Entity\ZoneCatalogs $zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return \Site\MainBundle\Entity\ZoneCatalogs
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Client
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
