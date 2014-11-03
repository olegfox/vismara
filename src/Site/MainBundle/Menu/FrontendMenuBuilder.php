<?php

namespace Site\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class FrontendMenuBuilder extends ContainerAware
{
    public function menu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $em = $this->container->get('doctrine.orm.entity_manager');
        $repository = $em->getRepository('SiteMainBundle:Menu');
        $secondmenu = $repository->findBy(array(), array('position' => 'asc'));
        $locale = $this->container->get('request')->get('_locale');

        foreach ($secondmenu as $key => $s) {
            if($locale == 'it'){
                $title = $s->getTitleIt();
            }elseif($locale == 'ru'){
                $title = $s->getTitleRu();
            }else{
                $title = $s->getTitle();
            }
            if ($s->getId() != 1) {
                if($s->getSlug() == 'collections'){
                    $m = $menu->addChild($title, array(
                        'route' => 'Site_main_gallery'
                    ));
                }else{
                    $menu->addChild($title, array(
                        'route' => 'Site_main_page',
                        'routeParameters' => array('slug' => $s->getSlug(), '_locale' => $locale)
                    ));
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