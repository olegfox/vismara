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

class NewsGalleryRuAdmin extends Admin
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
            ->add('title', 'text', array('label' => 'Head Ru'))
            ->end()
            ->with('Keywords')
            ->add('keyword', 'text', array('label' => 'Keywords Ru', 'required' => ''))
            ->with('Like Image')
            ->add('likeImage', 'sonata_media_type', array(
                'required' => true,
                'provider' => 'sonata.media.provider.image',
                'data_class'   =>  'Application\Sonata\MediaBundle\Entity\Media',
                'validation_groups' => array('Default', 'image'),
                'cascade_validation' => true,
                'context' => 'default',
                'label' => 'Picture'
            ))
            ->end()
            ->with('Description')
            ->add('description', 'textarea', array(
                'label' => 'Description Ru',
                'required' => '',
                "attr" => array(
                    "cols" => "100"
                )
            ))
            ->end()
            ->with('Images')
            ->add('images', 'sonata_type_collection',
                array(
                    'required' => false,
                    'by_reference' => false,
                    'label' => 'Images'
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'allow_delete' => true,
                    'targetEntity' => 'Site\MainBundle\Entity\Image'
                )
            )
            ->add('gallery', 'file', array(
                'data_class' => null,
                'required' => false,
                'attr' => array(
                    'class' => 'uploadify',
                    'multiple' => true
                ),
                'label' => ' ',
            ))
            ->end()
            ->with('Video')
            ->add('video', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.youtube',
                'context' => 'default',
                'label' => false
            ))
            ->end()
            ->with('Text')
            ->add('created', 'date', array('label' => 'Date created'))
            ->add('text', 'textarea', array(
                'label' => 'Text Ru',
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
            ->add('title', null, array("label" => "Head It"))
            ->add('created', null, array("label" => "Date created"));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text', array('label' => 'Head It'))
            ->add('created', 'date', array('label' => 'Date created'));
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