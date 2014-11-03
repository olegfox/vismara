<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{

    public function indexAction()
    {
        $repository_news_post = $this->getDoctrine()->getRepository("SiteMainBundle:NewsPost");
        $repository_news_video = $this->getDoctrine()->getRepository("SiteMainBundle:NewsVideo");
        $repository_news_gallery = $this->getDoctrine()->getRepository("SiteMainBundle:NewsGallery");

        $news_post = $repository_news_post->findAll();
        $news_video = $repository_news_video->findAll();
        $news_gallery = $repository_news_gallery->findAll();

        $news = array();
        $i = 0;

        foreach($news_post as $p){
            $news[$i][] = $p;
            $news[$i]['created'] = $p->getCreated()->getTimestamp();
            $i++;
        }

        foreach($news_video as $p){
            $news[$i][] = $p;
            $news[$i]['created'] = $p->getCreated()->getTimestamp();
            $i++;
        }

        foreach($news_gallery as $p){
            $news[$i][] = $p;
            $news[$i]['created'] = $p->getCreated()->getTimestamp();
            $i++;
        }

        usort($news, function($a, $b) {
            if($a['created'] > $b['created']){
                return 0;
            }
            return -1;
        });

        $params = array(
            "news" => $news
        );
        return $this->render('SiteMainBundle:News:index.html.twig', $params);
    }

}
