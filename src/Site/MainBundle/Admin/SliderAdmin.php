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

class SliderAdmin extends Admin
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
                'label' => 'Picture'
            ))
            ->add('lang', 'choice', array(
                'required' => true,
                'label' => 'Lang',
                'choices' => array(
                    0 => 'en',
                    1 => 'it',
                    2 => 'ru',
                    3 => 'cn',
                    4 => 'all'
                )
            ))
            ->add('video', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.youtube',
                'context' => 'default',
                'label' => 'Video Link'
            ))
            ->add('link', 'url', array(
                'required' => false,
                'label' => 'Link'
            ))
            ->add('dark', 'choice', array(
                'label' => 'Darker?',
                'choices' => array(
                    false => 'Yes',
                    true => 'No'
                )
            ))
            ->add('position', 'number', array(
                'label' => 'Position',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('text', 'textarea', array(
                'label' => 'The text on the slider EN',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->add('text_it', 'textarea', array(
                'label' => 'The text on the slider IT',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->add('text_ru', 'textarea', array(
                'label' => 'The text on the slider RU',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->add('text_cn', 'textarea', array(
                'label' => 'The text on the slider CN',
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

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'decimal', array('label' => 'ID'))
            ->add('position', 'text', array('label' => 'Position', 'editable' => true));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('img')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

} 