<?php

namespace Site\MainBundle\Entity;

class FeedbackCompany
{

    protected $nameCompany;

    protected $city;

    protected $contactName;

    protected $email;

    protected $message;

    public function getNameCompany()
    {
        return $this->nameCompany;
    }

    /**
     * {@inheritdoc}
     */
    public function setNameCompany($nameCompany)
    {
        $this->nameCompany = $nameCompany;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritdoc}
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * {@inheritdoc}
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

}
