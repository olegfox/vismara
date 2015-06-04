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

class ColorGroupAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Title EN'))
            ->add('title_it', 'text', array('label' => 'Title IT'))
            ->add('title_ru', 'text', array('label' => 'Title RU'))
            ->add('title_cn', 'text', array('label' => 'Title CN'))
            ->add('position', 'number', array(
                'label' => 'Position',
                'attr' => array(
                    'min' => 0
                )
            ));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text', array('label' => 'Title EN'))
            ->add('position', 'text', array('label' => 'Position', 'editable' => true));
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
            ->with('title_ru')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('title_cn')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }
} 