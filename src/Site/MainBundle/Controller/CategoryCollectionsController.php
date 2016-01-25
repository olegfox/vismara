<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryCollectionsController extends Controller
{
    /**
     * Список категорий продуктов
     *
     * @return Response
     */
    public function categoriesAction(){
        $categories = $this->getDoctrine()->getRepository("SiteMainBundle:CategoryGallery")->findBy(array(), array('position' => 'asc'));
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'products'));
        $styles = $this->getDoctrine()->getRepository("SiteMainBundle:StyleGallery")->findBy(array(), array('position' => 'ASC'));
        $params = array(
            "categories" => $categories,
            "page" => $page,
            "style" => $styles
        );
        return $this->render('SiteMainBundle:CategoryCollections:index.html.twig', $params);
    }
}
