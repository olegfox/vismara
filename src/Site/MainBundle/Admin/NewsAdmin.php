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

class NewsAdmin extends Admin
{
    protected
        $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'date'
    );

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('head', 'text', array('label' => 'Заголовок EN'))
            ->add('head_cz', 'text', array('label' => 'Заголовок CZ'))
            ->add('keyword', 'text', array('label' => 'Ключевые слова EN', 'required' => ''))
            ->add('keyword_cz', 'text', array('label' => 'Ключевые слова CZ', 'required' => ''))
            ->add('description', 'text', array('label' => 'Описание EN', 'required' => ''))
            ->add('description_cz', 'text', array('label' => 'Описание CZ', 'required' => ''))
            ->add('date', 'date', array('label' => 'Дата'))
            ->add('preview', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context' => 'default',
                'label' => 'Превью'
            ))
            ->add('text', 'textarea', array(
                'label' => 'Текст страницы EN',
                'required' => '',
                "attr" => array(
                    "class" => "redactor",
                    "width" => "653px",
                    "height" => "596px"
                )
            ))
            ->add('text_cz', 'textarea', array(
                'label' => 'Текст страницы CZ',
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
            ->add('head', null, array("label" => "Заголовок"));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'decimal', array('label' => 'ID'))
            ->add('head', 'text', array('label' => 'Заголовок'))
            ->add('date', 'date', array('label' => 'Дата'));
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('head')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('head_cz')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

    public function getNewInstance()
    {
        $news = parent::getNewInstance();

        $news->setDate(new \DateTime('now'));

        return $news;
    }

} 