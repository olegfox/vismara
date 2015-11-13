<?php

namespace Site\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\MainBundle\Entity\FeedbackProduct;
use Site\MainBundle\Form\Type\FeedbackProductType;

class ProductController extends Controller
{
    /**
     * Список продуктов
     *
     * @param $filter
     * @param $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($filter, $category, $slug = null){
        $category = $this->getDoctrine()->getRepository("SiteMainBundle:CategoryGallery")->findOneBy(array('slug' => $category));
        $products = $this->getDoctrine()->getRepository("SiteMainBundle:Product")->findByStyle($filter, $category);
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'products'));
        $filters = $this->getDoctrine()->getRepository("SiteMainBundle:StyleGallery")->findBy(array(), array('position' => 'asc'));
        $params = array(
            "products" => $products,
            "category" => $category,
            "filter" => $filter,
            "filters" => $filters,
            "page" => $page
        );

        if(!is_null($slug)){
            $product = $this->getDoctrine()->getRepository("SiteMainBundle:Product")->findOneBySlug($slug);

            if(!$product){
                throw $this->createNotFoundException('Product not found');
            }

            $params = array_merge($params, array(
                'product' => $product
            ));
        }

        return $this->render('SiteMainBundle:Product:index.html.twig', $params);
    }

    /**
     * Страница с продуктом
     *
     * @param $slug
     * @return string
     */
    public function oneAction($slug){
        $product = $this->getDoctrine()->getRepository("SiteMainBundle:Product")->findOneBySlug($slug);

        if (!$product) {
            throw $this->createNotFoundException("Not found product");
        }

        $feedback = new FeedbackProduct();
        $feedback->setProduct($product->getId());
        $form = $this->createForm(new FeedbackProductType(), $feedback);

        $params = array(
            "product" => $product,
            "form" => $form->createView()
        );
        return new Response($this->renderView("SiteMainBundle:Product:window.html.twig", $params), 200);
    }

    public function feedbackAction(Request $request)
    {
        $feedback = new FeedbackProduct();
        $form = $this->createForm(new FeedbackProductType(), $feedback);

        $form->handleRequest($request);

        if($form->isValid()){
            $product = $this->getDoctrine()->getRepository("SiteMainBundle:Product")->find($feedback->getproduct());

            if($product){
                $feedback->setProduct($product);
                $swift = \Swift_Message::newInstance()
                    ->setSubject('VismaraDesign Product Area')
                    ->setFrom(array('kontakti@vismara.it' => "VismaraDesign Product Area"))
                    ->setTo("kontakti@vismara.it")
                    ->setBody(
                        $this->renderView(
                            'SiteMainBundle:Product:message.html.twig',
                            array(
                                'feedback' => $feedback
                            )
                        )
                        , 'text/html'
                    );
                $this->get('mailer')->send($swift);
                return new JsonResponse(array(
                    'status' => 'OK'
                ));
            }
        } else{
            if ($form->count()) {
                foreach ($form as $child) {
                    if (!$child->isValid()) {
                        $errors[$child->getName()]['status'] = 'ERROR';
                    } else {
                        $errors[$child->getName()]['status'] = "OK";
                    }
                }
            }

            return new JsonResponse(array_merge(array('status' => 'ERROR'), $errors));
        }
    }
}
