<?php

namespace Site\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class FrontendMenuBuilder extends ContainerAware
{
    public function menu(FactoryInterface $factory, array $options)
    {
        $request = $this->container->get('request');

        $routeName = $request->get('_route');

        $menu = $factory->createItem('root');
        $em = $this->container->get('doctrine.orm.entity_manager');
        $repository = $em->getRepository('SiteMainBundle:Menu');
        $secondmenu = $repository->findBy(array(), array('position' => 'asc'));

        $locale = $this->container->get('request')->getLocale();

        foreach ($secondmenu as $key => $s) {
            if($locale == 'it'){
                $title = $s->getTitleIt();
            }elseif($locale == 'ru'){
                $title = $s->getTitleRu();
            }elseif($locale == 'cn'){
                $title = $s->getTitleCn();
            }else{
                $title = $s->getTitle();
            }
            if ($s->getId() != 1) {
                if($s->getSlug() == 'collections'){
                    $menu->addChild($title, array(
                        'route' => 'Site_main_gallery'
                    ));
                }elseif($s->getSlug() == 'products'){
                    $m = $menu->addChild($title, array(
                        'route' => 'Site_main_category_products'
                    ));

                    $m->setAttributes(array(
                        'class' => 'hide'
                    ));

                    if($routeName == 'Site_main_products'){
                        $m->setCurrent(true);
                    }
                }elseif($s->getSlug() == 'news'){
//                    if($locale != 'ru'){
                        $menu->addChild($title, array(
                            'route' => 'news_index'
                        ));
//                    }
                }else{
                    $m = $menu->addChild($title, array(
                        'route' => 'Site_main_page',
                        'routeParameters' => array('slug' => $s->getSlug(), '_locale' => $locale)
                    ));

                    if( ($s->getSlug() == 'catalogue_log-in' && $routeName == 'client_catalogs') ||
                        ($s->getSlug() == 'catalogue_log-in' && $routeName == 'client_login') ||
                        ($s->getSlug() == 'catalogue_log-in' && $routeName == 'client_register') ||
                        ($s->getSlug() == 'catalogue_log-in' && $routeName == 'client_register_complete')){
                        $m->setCurrent(true);
                    }

                    if($s->getSlug() == 'cookie'){
                        $m->setAttributes(array(
                            'class' => 'hide'
                        ));
                    }
                }
            }else{
                $menu->addChild($title, array(
                    'route' => 'Site_main_homepage',
                    'routeParameters' => array('_locale' => $locale)
                ));
            }
        }
        $menu->addChild("");
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        return $menu;
    }
}