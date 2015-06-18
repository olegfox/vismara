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

class ColorProductAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Title EN'))
            ->add('title_it', 'text', array('label' => 'Title IT'))
            ->add('title_ru', 'text', array('label' => 'Title RU'))
            ->add('title_cn', 'text', array('label' => 'Title CN'))
            ->add('description', 'textarea', array('label' => 'Description EN'))
            ->add('description_it', 'textarea', array('label' => 'Description IT'))
            ->add('description_ru', 'textarea', array('label' => 'Description RU'))
            ->add('description_cn', 'textarea', array('label' => 'Description CN'))
            ->add('position', 'number', array(
                'label' => 'Position',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('file', 'file', array('label' => 'Image', 'required' => false));
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
            ->addIdentifier('title', 'text', array('label' => 'Title'))
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

    public function prePersist($color) {
        $this->saveFile($color);
    }

    public function preUpdate($color) {
        $this->saveFile($color);
    }

    public function saveFile($color) {
        $basepath = $this->getRequest()->getBasePath();
        $color->upload($basepath);
    }
} 