<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Site\MainBundle\Entity\FeedbackCatalog;
use Site\MainBundle\Form\Type\FeedbackCatalogType;

class MainController extends Controller
{

    public function showLocaleAction() {
//        $locale = $this->get('request')->getLocale();
//        $this->get('session')->set('_locale', $locale);

//        $request = $this->get('request');
//        $session = $this->get('session');
//
//        $this->get('session')->set('_locale', $request->getPreferredLanguage(array('it', 'en', 'ru')));

        $locale = substr(locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']), 0, 2);

        if(!in_array($locale, array('it', 'en', 'ru'))){
            $locale = 'en';
        }

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
        }elseif($locale == "cn"){
            return $this
                ->redirect(
                    $this
                        ->generateUrl(
                            'Site_main_homepage', array("_locale" => 'cn')), 301);
        }
        return $this
            ->redirect(
                $this
                    ->generateUrl(
                        'Site_main_homepage', array("_locale" => 'en')), 301);
    }

    public function indexAction()
    {
        $locale = $this->get('request')->getLocale();
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->find(1);
        $sliders = $this->getDoctrine()->getRepository("SiteMainBundle:Slider")->findByLang($locale);
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
        $catalogs = $this->getDoctrine()->getRepository("SiteMainBundle:Gallery")->findBy(array(), array('position' => 'ASC'));
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'collections'));
        $params = array(
            "catalogs" => $catalogs,
            "page" => $page
        );
        return $this->render('SiteMainBundle:Gallery:index.html.twig', $params);
    }

    public function catalogsAction(){
        if($this->get('security.context')->isGranted('ROLE_USER')){
            $user = $this->get('security.context')->getToken()->getUser();
            return $this->redirect($this->generateUrl('client_catalogs', array('slug' => $user->getZone()->getSlug())));
        }

        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'catalogue_log-in'));

        $params = array(
            "page" => $page
        );
        return $this->render('SiteMainBundle:Catalogs:index.html.twig', $params);
    }

    public function catalogsOldAction(){
        return $this->redirect($this->generateUrl('Site_main_catalogs'), 302);
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
