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

class CatalogsAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('zone', 'entity', array(
                'required' => false,
                'label' => 'Zone',
                'class' => 'SiteMainBundle:ZoneCatalogs'
            ))
            ->add('type', 'choice', array(
                'required' => true,
                'label' => 'Type',
                'choices' => array(
                    0 => 'catalog',
                    1 => 'pricelist'
                )
            ))
            ->add('title', 'text', array('label' => 'Header EN'))
            ->add('title_it', 'text', array('label' => 'Header IT'))
            ->add('title_ru', 'text', array('label' => 'Header RU'))
            ->add('title_cn', 'text', array('label' => 'Header CN'))
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
            ->add('file', 'file', array('label' => 'PDF', 'required' => false))
            ->add('photoFile', 'file', array('label' => 'Photo Preview', 'required' => false));
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
            ->addIdentifier('title', 'text', array('label' => 'Header'))
            ->add('position', 'text', array('label' => 'Position', 'editable' => true))
            ->add('zone', null, array('label' => 'Zone'))
            ->add('type', 'choice', array(
                'label' => 'Type',
                'editable' => true,
                'choices' => array(
                    0 => 'catalog',
                    1 => 'pricelist'
                )
            ));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('title')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

    public function prePersist($catalogs) {
        $this->saveFile($catalogs);
    }

    public function preUpdate($catalogs) {
        $this->saveFile($catalogs);
    }

    public function saveFile($catalogs) {
        $basepath = $this->getRequest()->getBasePath();
        $catalogs->upload($basepath);
        $catalogs->photoUpload($basepath);
    }
} 