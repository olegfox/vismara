<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 07.01.14
 * Time: 13:17
 */

namespace Site\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class FeedbackCatalogAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('company_name', 'text', array('label' => 'form_catalog.company_name'))
            ->add('privat_contact', 'text', array('label' => 'form_catalog.privat_contact'))
            ->add('contact_name', 'text', array('label' => 'form_catalog.contact_name'))
            ->add('your_task', 'text', array('label' => 'form_catalog.your_task'))
            ->add('company_field', 'text', array('label' => 'form_catalog.company_field'))
            ->add('country', 'text', array('label' => 'form_catalog.country'))
            ->add('city', 'text', array('label' => 'form_catalog.city'))
            ->add('address', 'text', array('label' => 'form_catalog.address'))
            ->add('email', 'email', array('label' => 'form_catalog.email'))
            ->add('website', 'text', array('label' => 'form_catalog.website'))
            ->add('text', 'textarea', array('label' => 'form_catalog.text'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email', null, array('label' => 'Email'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('email', 'text', array('label' => 'Email'));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('email')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }
} 