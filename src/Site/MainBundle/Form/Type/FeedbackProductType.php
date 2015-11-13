<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Site\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FeedbackProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', array(
                'required' => true,
                'label' => "First name",
                "attr" => array(
                    "placeholder" => "First name"
                )
            ))
            ->add('lastname', 'text', array(
                'required' => true,
                'label' => "Second name",
                "attr" => array(
                    "placeholder" => "Second name"
                )
            ))
            ->add('country', 'text', array(
                'required' => false,
                'label' => "Country",
                "attr" => array(
                    "placeholder" => "form_catalog.country"
                )
            ))
            ->add('email', 'repeated', array(
                'type' => 'email',
                'required' => true,
                'first_options'  => array(
                    'label' => false,
                    'attr' => array(
                        'placeholder' => 'form.email',
                        "class" => "form-control",
                        "ng-model" => "user.email"
                    )
                ),
                'second_options' => array(
                    'label' => false,
                    'attr' => array(
                        'placeholder' => 'form.repeate_email',
                        "class" => "form-control",
                        "ng-model" => "user.email2"
                    )
                ),
            ))
            ->add('phone', 'text', array(
                'required' => false,
                'label' => "Phone",
                "attr" => array(
                    "placeholder" => "form_catalog.text"
                )
            ))
            ->add('product', 'hidden', array(
                'required' => false,
                'label' => false
            ));
    }

    public function getName()
    {
        return '';
    }
}
