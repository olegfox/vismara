<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * Список продуктов
     *
     * @param $filter
     * @param $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($filter, $category){
        $category = $this->getDoctrine()->getRepository("SiteMainBundle:CategoryGallery")->findOneBy(array('slug' => $category));
        $products = $this->getDoctrine()->getRepository("SiteMainBundle:Product")->findByStyle($filter, $category);
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'products'));
        $filters = $this->getDoctrine()->getRepository("SiteMainBundle:StyleGallery")->findAll();
        $params = array(
            "products" => $products,
            "category" => $category,
            "filter" => $filter,
            "filters" => $filters,
            "page" => $page
        );
        return $this->render('SiteMainBundle:Product:index.html.twig', $params);
    }
}
