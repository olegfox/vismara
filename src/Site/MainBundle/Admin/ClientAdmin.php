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
use Sonata\AdminBundle\Route\RouteCollection;

class ClientAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('company_name', 'text', array('label' => 'Company name'))
            ->add('contact_name', 'text', array('label' => 'Contact name'))
            ->add('your_task', 'text', array('label' => 'Your task'))
            ->add('company_field', 'text', array('label' => 'Company field'))
            ->add('country', 'text', array('label' => 'Country'))
            ->add('city', 'text', array('label' => 'City'))
            ->add('address', 'text', array('label' => 'Address'))
            ->add('email', 'email', array('label' => 'E-mail'))
            ->add('website', 'text', array('label' => 'Website'))
            ->add('text', 'textarea', array('label' => 'Text'))
            ->add('isActive', 'choice', array(
                'required' => true,
                'label' => 'Active',
                'choices' => array(
                    false => 'No',
                    true => 'Yes'
                )
            ));
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
            ->addIdentifier('email', 'text', array('label' => 'Email'))
            ->add('isActive', 'choice', array(
                'required' => true,
                'label' => 'Active',
                'choices' => array(
                    false => 'No',
                    true => 'Yes'
                )
            ));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('email')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
} 