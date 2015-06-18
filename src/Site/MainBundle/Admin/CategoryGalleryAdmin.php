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

class CategoryGalleryAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Header EN'))
            ->add('title_it', 'text', array('label' => 'Header IT'))
            ->add('title_ru', 'text', array('label' => 'Header RU'))
            ->add('title_cn', 'text', array('label' => 'Header CN'))
            ->add('keyword', 'text', array('label' => 'Keywords EN', 'required' => ''))
            ->add('keyword_it', 'text', array('label' => 'Keywords IT', 'required' => ''))
            ->add('keyword_ru', 'text', array('label' => 'Keywords RU', 'required' => ''))
            ->add('keyword_cn', 'text', array('label' => 'Keywords CN', 'required' => ''))
            ->add('description', 'textarea', array('label' => 'Description EN'))
            ->add('description_it', 'textarea', array('label' => 'Description IT'))
            ->add('description_ru', 'textarea', array('label' => 'Description RU'))
            ->add('description_cn', 'textarea', array('label' => 'Description CN'))
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