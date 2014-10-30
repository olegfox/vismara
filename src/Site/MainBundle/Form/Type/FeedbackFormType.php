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

/**
 * Profile form.
 *
 * @author Julien Janvier <j.janvier@gmail.com>
 */
class FeedbackFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', array(
                'label' => false,
                "attr" => array(
                    "placeholder" => "form.first_name",
                    "class" => "form-control",
                    "ng-model" => "user.firstName",
                    "ng-minlength" => "2",
                    "ng-maxlength" => "255"
                )
            ))
            ->add('lastname', 'text', array(
                'label' => false,
                "attr" => array(
                    "placeholder" => "form.second_name",
                    "class" => "form-control",
                    "ng-model" => "user.lastName",
                    "ng-minlength" => "2",
                    "ng-maxlength" => "255"
                )
            ))
            ->add('city', 'text', array(
                'label' => false,
                "attr" => array(
                    "placeholder" => "form.city",
                    "class" => "form-control",
                    "ng-model" => "user.city",
                    "ng-minlength" => "2",
                    "ng-maxlength" => "255"
                )
            ))
            ->add('email', 'repeated', array(
                'type' => 'email',
                'required' => true,
                'first_options'  => array(
                    'label' => false,
                    'attr' => array(
                        'placeholder' => 'Email',
                        "class" => "form-control",
                        "ng-model" => "user.email"
                    )
                ),
                'second_options' => array(
                    'label' => false,
                    'attr' => array(
                        'placeholder' => 'form.repeat_email',
                        "class" => "form-control",
                        "ng-model" => "user.email2"
                    )
                ),
            ))
            ->add('message', 'textarea', array(
                'label' => false,
                'required' => false,
                "attr" => array(
                    "placeholder" => "form.message",
                    "class" => "form-control",
                    "ng-model" => "user.message",
                    "cols" => "40",
                    "rows" => "5"
                )
            ));
    }

    public function getName()
    {
        return '';
    }
}
