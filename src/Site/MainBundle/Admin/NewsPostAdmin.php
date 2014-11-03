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

class NewsPostAdmin extends Admin
{
    protected
        $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'created'
    );

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Head')
            ->add('title', 'text', array('label' => 'Head EN'))
            ->add('title_it', 'text', array('label' => 'Head It'))
            ->add('title_ru', 'text', array('label' => 'Head RU'))
            ->end()
            ->with('Keywords')
            ->add('keyword', 'text', array('label' => 'Keywords EN', 'required' => ''))
            ->add('keyword_it', 'text', array('label' => 'Keywords IT', 'required' => ''))
            ->add('keyword_ru', 'text', array('label' => 'Keywords RU', 'required' => ''))
            ->with('Description')
            ->add('description', 'textarea', array(
                'label' => 'Description EN',
                'required' => '',
                "attr" => array(
                    "cols" => "100"
                )
            ))
            ->add('description_it', 'textarea', array(
                'label' => 'Description IT',
                'required' => '',
                "attr" => array(
                    "cols" => "100"
                )
            ))
            ->add('description_ru', 'textarea', array(
                'label' => 'Description RU',
                'required' => '',
                "attr" => array(
                    "cols" => "100"
                )
            ))
            ->end()
            ->with('Text')
            ->add('created', 'date', array('label' => 'Date created'))
            ->add('text', 'textarea', array(
                'label' => 'Text EN',
                'required' => '',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->add('text_it', 'textarea', array(
                'label' => 'Text IT',
                'required' => '',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->add('text_ru', 'textarea', array(
                'label' => 'Text RU',
                'required' => '',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->end();
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array("label" => "Head EN"))
            ->add('created', null, array("label" => "Date created"));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text', array('label' => 'Head EN'))
            ->add('created', 'date', array('label' => 'Date created'));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('title')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('title_it')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('title_it')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

} 