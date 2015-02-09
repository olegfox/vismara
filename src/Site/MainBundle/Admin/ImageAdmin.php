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

class ImageAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('src', 'text', array('label' => 'Path', 'read_only' => true))
            ->add('title', 'text', array('label' => 'Title EN'))
            ->add('title_it', 'text', array('label' => 'Title IT'))
            ->add('title_ru', 'text', array('label' => 'Title RU'))
            ->add('description', 'textarea', array(
                'label' => 'Description EN',
                'required' => '',
                "attr" => array(
                    "cols" => "20"
                )
            ))
            ->add('description_it', 'textarea', array(
                'label' => 'Description IT',
                'required' => '',
                "attr" => array(
                    "cols" => "20"
                )
            ))
            ->add('description_ru', 'textarea', array(
                'label' => 'Description RU',
                'required' => '',
                "attr" => array(
                    "cols" => "20"
                )
            ))
            ->add('position', 'number', array(
                'label' => 'Position',
                'attr' => array(
                    'min' => 0
                )
            ));
    }

    // Fields to be shown on filter forms
//    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
//    {
//        $datagridMapper
//            ->add('title');
//    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', 'text', array('label' => 'Name'))
            ->addIdentifier('src', 'text', array('label' => 'Path'))
            ->addIdentifier('mimeType', 'text', array('label' => 'Mime Type'));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('name')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('src')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('mimeType')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
} 