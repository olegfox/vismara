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

class VideoAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('title')
            ->add('created', 'date', array(
                'label' => 'Created'
            ))
            ->add('title', 'textarea', array(
                'label' => 'Header EN'
            ))
            ->add('title_it', 'textarea', array(
                'label' => 'Header IT'
            ))
            ->add('title_ru', 'textarea', array(
                'label' => 'Header RU'
            ))
            ->add('title_cn', 'textarea', array(
                'label' => 'Header CN'
            ))
            ->end()
            ->with('description')
            ->add('description', 'textarea', array(
                'label' => 'Description EN'
            ))
            ->add('description_it', 'textarea', array(
                'label' => 'Description IT'
            ))
            ->add('description_ru', 'textarea', array(
                'label' => 'Description RU'
            ))
            ->add('description_cn', 'textarea', array(
                'label' => 'Description CN'
            ))
            ->end()
            ->add('value', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.youtube',
                'context' => 'default',
                'label' => false
            ));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text', array('label' => 'Header'))
            ->add('value', 'text', array('label' => 'Video'))
            ->add('created', 'date', array('label' => 'Created', 'editable' => true));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('value')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
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
            ->end()
            ->with('description')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('description_it')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('description_ru')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('description_cn')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

} 