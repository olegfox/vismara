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

class FeedbackCatalogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company_name', 'text', array(
                'required' => true,
                'label' => false,
                'attr' => array(
                    "placeholder" => "form_catalog.company_name",
                    "class" => "form-control",
                    "ng-model" => "user.nameCompany",
                    "ng-minlength" => "2",
                    "ng-maxlength" => "255"
                )
            ))
//            ->add('privat_contact', 'text', array(
//                'required' => false,
//                'label' => false,
//                'attr' => array(
//                    "placeholder" => "form_catalog.privat_contact",
//                    "class" => "form-control",
//                    "ng-model" => "user.privatContact",
//                    "ng-minlength" => "2",
//                    "ng-maxlength" => "255"
//                )
//            ))
            ->add('contact_name', 'text', array(
                'required' => true,
                'label' => false,
                'attr' => array(
                    "placeholder" => "form_catalog.contact_name",
                    "class" => "form-control",
                    "ng-model" => "user.contactName",
                    "ng-minlength" => "2",
                    "ng-maxlength" => "255"
                )
            ))
            ->add('your_task', 'text', array(
                'required' => false,
                'label' => false,
                'attr' => array(
                    "placeholder" => "form_catalog.your_task",
                    "class" => "form-control",
                    "ng-model" => "user.yourTask"
                )
            ))
            ->add('company_field', 'text', array(
                'required' => true,
                'label' => false,
                'attr' => array(
                    "placeholder" => "form_catalog.company_field",
                    "class" => "form-control",
                    "ng-model" => "user.companyField",
                    "ng-minlength" => "2",
                    "ng-maxlength" => "255"
                )
            ))
            ->add('country', 'text', array(
                'required' => true,
                'label' => false,
                'attr' => array(
                    "placeholder" => "form_catalog.country",
                    "class" => "form-control",
                    "ng-model" => "user.country",
                    "ng-minlength" => "2",
                    "ng-maxlength" => "255"
                )
            ))
            ->add('city', 'text', array(
                'required' => true,
                'label' => false,
                'attr' => array(
                    "placeholder" => "form_catalog.city",
                    "class" => "form-control",
                    "ng-model" => "user.city",
                    "ng-minlength" => "2",
                    "ng-maxlength" => "255"
                )
            ))
            ->add('address', 'textarea', array(
                'required' => false,
                'label' => false,
                'attr' => array(
                    "placeholder" => "form_catalog.address",
                    "class" => "form-control",
                    "ng-model" => "user.address",
                    "cols" => "40",
                    "rows" => "5"
                )
            ))
            ->add('email', 'repeated', array(
                'type' => 'email',
                'required' => true,
                'first_options'  => array(
                    'label' => false,
                    'attr' => array(
                        'placeholder' => 'form_catalog.email',
                        "class" => "form-control",
                        "ng-model" => "user.email"
                    )
                ),
                'second_options' => array(
                    'label' => false,
                    'attr' => array(
                        'placeholder' => 'form_catalog.confirm_email',
                        "class" => "form-control",
                        "ng-model" => "user.email2"
                    )
                ),
            ))
            ->add('website', 'text', array(
                'required' => false,
                'label' => false,
                'attr' => array(
                    "placeholder" => "form_catalog.website",
                    "class" => "form-control",
                    "ng-model" => "user.website"
                )
            ))
            ->add('text', 'textarea', array(
                'label' => false,
                'required' => true,
                "attr" => array(
                    "placeholder" => "form_catalog.text",
                    "class" => "form-control",
                    "ng-model" => "user.text",
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
