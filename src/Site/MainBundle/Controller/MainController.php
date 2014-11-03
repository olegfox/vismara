<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{

    public function showLocaleAction() {
        $locale = $this->get('request')->getLocale();
        $this->get('session')->set('_locale', $locale);
        if ($locale == "it") {
            return $this
                ->redirect(
                    $this
                        ->generateUrl(
                            'Site_main_homepage', array("_locale" => 'it')), 301);
        }elseif($locale == "ru"){
            return $this
                ->redirect(
                    $this
                        ->generateUrl(
                            'Site_main_homepage', array("_locale" => 'ru')), 301);
        }
        return $this
            ->redirect(
                $this
                    ->generateUrl(
                        'Site_main_homepage', array("_locale" => 'en')), 301);
    }

    public function indexAction()
    {
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->find(1);
        $sliders = $this->getDoctrine()->getRepository("SiteMainBundle:Slider")->findBy(array(), array('position' => 'asc'));
        $catalogs = $this->getDoctrine()->getRepository("SiteMainBundle:Gallery")->findBy(array(), array('position' => 'asc'));
        $params = array(
            "page" => $page,
            "sliders" => $sliders,
            "catalogs" => $catalogs
        );
        return $this->render('SiteMainBundle:Main:index.html.twig', $params);
    }

    public function collectionOneAction($slug, $slugImage = ''){
        $catalog = $this->getDoctrine()->getRepository("SiteMainBundle:Gallery")->findOneBy(array('slug' => $slug));
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'collections'));
        $images = $this->getDoctrine()->getRepository("SiteMainBundle:Image")->findBy(array('gallery' => $catalog), array('position' => 'asc'));
        $params = array(
            "catalog" => $catalog,
            "images" => $images,
            "page" => $page
        );
        if($slugImage != ""){
            $image = $this->getDoctrine()->getRepository("SiteMainBundle:Image")->findOneBy(array('slug' => $slugImage));
            if(!$image){
                $image = $this->getDoctrine()->getRepository("SiteMainBundle:Image")->findOneBy(array('id' => $slugImage));
            }

            $params['image'] = $image;
        }
        return $this->render('SiteMainBundle:Gallery:one.html.twig', $params);
    }

    public function collectionsAction(){
        $catalogs = $this->getDoctrine()->getRepository("SiteMainBundle:Gallery")->findBy(array(), array('position' => 'asc'));
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'collections'));
        $params = array(
            "catalogs" => $catalogs,
            "page" => $page
        );
        return $this->render('SiteMainBundle:Gallery:index.html.twig', $params);
    }

    public function catalogsAction(){
        $catalogs = $this->getDoctrine()->getRepository("SiteMainBundle:Catalogs")->findAll();
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'catalogue'));
        $params = array(
            "catalogs" => $catalogs,
            "page" => $page
        );
        return $this->render('SiteMainBundle:Catalogs:index.html.twig', $params);
    }

    public function generateImagesAction(){
        set_time_limit(0);
        $gallery = $this->getDoctrine()->getRepository("SiteMainBundle:Gallery")->findAll();
        foreach($gallery as $g){
            foreach($g->getImages() as $image){
                $src = $image->getSrc();
                $minSrc = $image->getMinSrc();
                $this->get('image.handling')->open($src)
                    ->cropResize(1920, 1080)
                    ->save($src);
                $width = $this->get('image.handling')->open($src)->width() - 170;
                $height = $this->get('image.handling')->open($src)->height() - 48;
                $this->get('image.handling')->open($src)
                    ->merge($this->get('image.handling')->open("sitemain/img/water.png"), $width, $height, 170, 48)
                    ->save($minSrc);
                print $minSrc." ";
            }
        }
        return new Response('Обновление завершено.');
    }
}
