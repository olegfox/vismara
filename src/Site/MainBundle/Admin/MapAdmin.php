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

class MapAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Header EN'))
            ->add('name_it', 'text', array('label' => 'Header IT'))
            ->add('name_ru', 'text', array('label' => 'Header RU'))
            ->add('name_cn', 'text', array('label' => 'Header CN'))
            ->add('phone', 'text', array('label' => 'Phone', 'required' => false))
            ->add('text', 'text', array('label' => 'Text EN', 'required' => false))
            ->add('text_it', 'text', array('label' => 'Text IT', 'required' => false))
            ->add('text_ru', 'text', array('label' => 'Text RU', 'required' => false))
            ->add('text_cn', 'text', array('label' => 'Text CN', 'required' => false))
            ->add('coord', 'text', array('label' => 'Coordinates'))
            ->add('flagCn', 'choice', array(
                'label' => 'China City?',
                'choices' => array(
                    false => 'No',
                    true => 'Yes'
                ),
            ))
            ->add('img', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'data_class'   =>  'Application\Sonata\MediaBundle\Entity\Media',
                'validation_groups' => array('Default', 'image'),
                'cascade_validation' => true,
                'context' => 'default',
                'label' => 'Picture'
            ));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Header'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', 'text', array('label' => 'Header'))
            ->addIdentifier('flagCn', 'choice', array(
                'label' => 'China City?',
                'choices' => array(
                    false => 'No',
                    true => 'Yes'
                ),
            ));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('name')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('coord')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }
} 