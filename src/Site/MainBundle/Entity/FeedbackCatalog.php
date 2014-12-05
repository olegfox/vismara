<?php

namespace Site\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="feedback_catalog")
 */
class FeedbackCatalog
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $company_name;

    /**
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $privat_contact;

    /**
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $contact_name;

    /**
     * @ORM\Column(type="text", nullable = false)
     */
    protected $your_task;

    /**
     * @ORM\Column(type="text", nullable = false)
     */
    protected $company_field;

    /**
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length = 200, nullable = false)
     */
    protected $city;

    /**
     * @ORM\Column(type="text", nullable = false)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length = 100, nullable = false)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length = 100, nullable = false)
     */
    protected $website;

    /**
     * @ORM\Column(type="text", nullable = false)
     */
    protected $text;


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
     * Set company_name
     *
     * @param string $companyName
     * @return FeedbackCatalog
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
     * Set privat_contact
     *
     * @param string $privatContact
     * @return FeedbackCatalog
     */
    public function setPrivatContact($privatContact)
    {
        $this->privat_contact = $privatContact;

        return $this;
    }

    /**
     * Get privat_contact
     *
     * @return string 
     */
    public function getPrivatContact()
    {
        return $this->privat_contact;
    }

    /**
     * Set contact_name
     *
     * @param string $contactName
     * @return FeedbackCatalog
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
     * @return FeedbackCatalog
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
     * @return FeedbackCatalog
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
     * @return FeedbackCatalog
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
     * @return FeedbackCatalog
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
     * @return FeedbackCatalog
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
     * Set email
     *
     * @param string $email
     * @return FeedbackCatalog
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
     * Set website
     *
     * @param string $website
     * @return FeedbackCatalog
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
     * @return FeedbackCatalog
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
}
