<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{

    public function indexAction()
    {
        $request = $this->get('request');
        $locale = $request->getLocale();

        if($locale == 'it'){
            $repository = $this->getDoctrine()->getRepository("SiteMainBundle:NewsGalleryIt");
        }elseif($locale == 'ru'){
            $repository = $this->getDoctrine()->getRepository("SiteMainBundle:NewsGalleryRu");
        }else{
            $repository = $this->getDoctrine()->getRepository("SiteMainBundle:NewsGallery");
        }

        $news = $repository->findAll();

        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array("slug" => "news"));

        $params = array(
            "news" => $news,
            "page" => $page
        );
        return $this->render('SiteMainBundle:News:index.html.twig', $params);
    }

    public function postAction($slug){
        $request = $this->get('request');
        $locale = $request->getLocale();

        if($locale == 'it'){
            $repository = $this->getDoctrine()->getRepository("SiteMainBundle:NewsGalleryIt");
        }elseif($locale == 'ru'){
            $repository = $this->getDoctrine()->getRepository("SiteMainBundle:NewsGalleryRu");
        }else{
            $repository = $this->getDoctrine()->getRepository("SiteMainBundle:NewsGallery");
        }

        $n = $repository->findOneBy(array('slug' => $slug));

        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array("slug" => "news"));

        $params = array(
            "n" => $n,
            "page" => $page
        );
        return $this->render('SiteMainBundle:News:one.html.twig', $params);
    }

}
