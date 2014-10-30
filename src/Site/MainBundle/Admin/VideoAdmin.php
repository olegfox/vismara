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
            ->add('title', 'text', array(
                'label' => 'Header EN'
            ))
            ->add('title_it', 'text', array(
                'label' => 'Header IT'
            ))
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
            ->add('value', 'text', array('label' => 'Video'));
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
            ->end();
    }

} 