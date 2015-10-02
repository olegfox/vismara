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

class ProductAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('collection', 'entity', array(
                'required' => true,
                'label' => 'Collection',
                'class' => 'SiteMainBundle:Gallery'
            ))
            ->add('style', 'entity', array(
                'required' => true,
                'label' => 'Style',
                'class' => 'SiteMainBundle:StyleGallery'
            ))
            ->add('category', 'entity', array(
                'required' => true,
                'label' => 'Category',
                'class' => 'SiteMainBundle:CategoryGallery'
            ))
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
            ->add('size', 'textarea', array('label' => 'Size EN'))
            ->add('size_it', 'textarea', array('label' => 'Size IT'))
            ->add('size_ru', 'textarea', array('label' => 'Size RU'))
            ->add('size_cn', 'textarea', array('label' => 'Size CN'))
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
            ))
            ->add('text_cn', 'textarea', array(
                'label' => 'Text CN',
                'required' => '',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
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
            ->add('colors', 'sonata_type_collection',
                array(
                    'required' => false,
                    'by_reference' => false,
                    'label' => 'Color'
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'allow_delete' => true,
                    'targetEntity' => 'Site\MainBundle\Entity\ColorProduct'
                )
            );
    }

    public function prePersist($product)
    {
        if ($product->getColors()) {
            foreach ($product->getColors() as $color) {
                $color->setProduct($product);
                $this->saveFile($color);
            }
        }
    }

    public function preUpdate($product)
    {
        if ($product->getColors()) {
            foreach ($product->getColors() as $color) {
                $color->setProduct($product);
                $this->saveFile($color);
            }
        }
    }

    public function saveFile($color) {
        $basepath = $this->getRequest()->getBasePath();
        $color->upload($basepath);
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Header EN'))
            ->add('collection', null, array('label' => 'Collection'))
            ->add('style', null, array('label' => 'Style'))
            ->add('category', null, array('label' => 'Category'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text', array('label' => 'Заголовок'))
            ->add('position', 'text', array('label' => 'Позиция', 'editable' => true))
            ->add('category', null, array('label' => 'Category'))
            ->add('style', null, array('label' => 'Style'));
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