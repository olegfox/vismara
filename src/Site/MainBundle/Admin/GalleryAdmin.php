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

class GalleryAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Header EN'))
            ->add('title_it', 'text', array('label' => 'Header IT'))
            ->add('title_ru', 'text', array('label' => 'Header RU'))
            ->add('titleImg', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context' => 'default',
                'label' => 'Picture Caption'
            ))
            ->add('showTitleImg', 'choice', array(
                'label' => 'Show header image?',
                'choices' => array(
                    false => 'No',
                    true => 'Yes'
                )
            ))
            ->add('keyword', 'text', array('label' => 'Keywords EN', 'required' => ''))
            ->add('keyword_it', 'text', array('label' => 'Keywords IT', 'required' => ''))
            ->add('keyword_ru', 'text', array('label' => 'Keywords RU', 'required' => ''))
            ->add('description', 'textarea', array('label' => 'Description EN'))
            ->add('description_it', 'textarea', array('label' => 'Description IT'))
            ->add('description_ru', 'textarea', array('label' => 'Description RU'))
            ->add('hideTitle', 'choice', array(
                'label' => 'Show title at the miniature?',
                'choices' => array(
                    false => 'Yes',
                    true => 'No'
                )
            ))
            ->add('hideDark', 'choice', array(
                'label' => 'Darker thumbnail?',
                'choices' => array(
                    false => 'Yes',
                    true => 'No'
                )
            ))
            ->add('dark', 'choice', array(
                'label' => 'Darker stripes?',
                'choices' => array(
                    false => 'Yes',
                    true => 'No'
                )
            ))
            ->add('bgShow', 'choice', array(
                'label' => 'Show bottom strip?',
                'choices' => array(
                    false => 'Yes',
                    true => 'No'
                )
            ))
            ->add('position', 'number', array(
                'label' => 'Position',
                'required' => false,
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('preview', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context' => 'default',
                'label' => 'Previews'
            ))
            ->add('background', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context' => 'default',
                'label' => 'Background stripes'
            ))
            ->add('images', 'sonata_type_collection',
                array(
                    'required' => false,
                    'by_reference' => false,
                    'label' => 'Photographs'
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
            ));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Заголовок'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text', array('label' => 'Заголовок'))
            ->add('position', 'text', array('label' => 'Позиция', 'editable' => true));
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