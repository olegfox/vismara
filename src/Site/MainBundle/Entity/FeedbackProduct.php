<?php

namespace Site\MainBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class FeedbackProduct
{

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255
     * )
     */
    protected $firstname;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255
     * )
     */
    protected $lastname;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255
     * )
     */
    protected $country;

    /**
     * @Assert\NotBlank()
     * @Assert\Email
     */
    protected $email;

    protected $phone;

    /**
     * @Assert\NotBlank()
     */
    protected $text;

    protected $product;

    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * {@inheritdoc}
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * {@inheritdoc}
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
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

    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * {@inheritdoc}
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    /**
     * {@inheritdoc}
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }

    /**
     * {@inheritdoc}
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }
}
