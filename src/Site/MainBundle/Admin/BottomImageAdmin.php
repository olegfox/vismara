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

class BottomImageAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('img', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'data_class'   =>  'Application\Sonata\MediaBundle\Entity\Media',
                'validation_groups' => array('Default', 'image'),
                'cascade_validation' => true,
                'context' => 'default',
                'label' => 'Изображение'
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
            ->addIdentifier('id', 'decimal', array('label' => 'ID'));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('img')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
        $collection->remove('create');
    }

} 