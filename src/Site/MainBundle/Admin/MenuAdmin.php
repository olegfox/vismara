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

class MenuAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Head')
            ->add('title', 'text', array('label' => 'Header EN'))
            ->add('title_it', 'text', array('label' => 'Header IT'))
            ->add('title_ru', 'text', array('label' => 'Header RU'))
            ->end()
            ->with('Keywords')
            ->add('keyword', 'text', array('label' => 'Keywords EN', 'required' => ''))
            ->add('keyword_it', 'text', array('label' => 'Keywords IT', 'required' => ''))
            ->add('keyword_ru', 'text', array('label' => 'Keywords RU', 'required' => ''))
            ->end()
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
            ->add('position', 'number', array(
                'label' => 'Position',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('dark', 'choice', array(
                'label' => 'Darker stripes?',
                'choices' => array(
                    false => 'Yes',
                    true => 'No'
                )
            ))
            ->add('background', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context' => 'default',
                'label' => 'Background stripes'
            ))
            ->add('text', 'textarea', array(
                'label' => 'The text of the page EN',
                'required' => '',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->add('text_it', 'textarea', array(
                'label' => 'The text of the page IT',
                'required' => '',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->add('text_ru', 'textarea', array(
                'label' => 'The text of the page RU',
                'required' => '',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Header'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text', array('label' => 'Header'))
            ->add('position', 'text', array('label' => 'Position', 'editable' => true));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('title')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }
} 