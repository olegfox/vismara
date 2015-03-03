<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Site\MainBundle\Entity\Feedback;
use Site\MainBundle\Entity\FeedbackCompany;
use Site\MainBundle\Entity\FeedbackCatalog;
use Site\MainBundle\Form\Type\FeedbackFormType;
use Site\MainBundle\Form\Type\FeedbackCompanyFormType;
use Site\MainBundle\Form\Type\FeedbackCatalogType;


class PageController extends Controller
{

    public function indexAction(Request $request, $slug)
    {
        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug($slug);
        $params = array(
            "page" => $page
        );
        if($slug == 'contacts'){
            $maps = $this->getDoctrine()->getRepository('SiteMainBundle:Map')->findAll();
            $params['maps'] = $maps;
        }
        return $this->render('SiteMainBundle:Page:index.html.twig', $params);

    }

    public function feedbackChooseAction(){
        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('contacts');

        return $this->render('SiteMainBundle:Page:feedbackChoose.html.twig', array(
            "page" => $page
        ));
    }

    public function feedbackPrivatePersonAction(Request $request)
    {
        $feedback = new Feedback();
        $form = $this->createForm(new FeedbackFormType(), $feedback);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if($form->isValid()){
                $swift = \Swift_Message::newInstance()
                    ->setSubject('VismaraDesign FOR PRIVATS')
                    ->setFrom(array('kontakti@vismara.it' => "VismaraDesign FOR PRIVATS"))
                    ->setTo("kontakti@vismara.it")
                    ->setBody(
                        $this->renderView(
                            'SiteMainBundle:Page:messagePrivatePerson.html.twig',
                            array(
                                'feedback' => $feedback
                            )
                        )
                        , 'text/html'
                    );
                $this->get('mailer')->send($swift);
                return new Response("ok");
            }
        }

        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('contacts');

        return $this->render('SiteMainBundle:Page:feedbackPrivatePerson.html.twig', array(
            'form' => $form->createView(),
            "page" => $page
        ));
    }

    public function feedbackCompanyAction(Request $request)
    {
        $feedback = new FeedbackCatalog();
        $form = $this->createForm(new FeedbackCatalogType(), $feedback);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if($form->isValid()){
                $swift = \Swift_Message::newInstance()
                    ->setSubject('VismaraDesign FOR COMPANIES')
                    ->setFrom(array('kontakti@vismara.it' => "VismaraDesign FOR COMPANIES"))
                    ->setTo('kontakti@vismara.it')
                    ->setBody(
                        $this->renderView(
                            'SiteMainBundle:Page:messageCompany.html.twig',
                            array(
                                'feedback' => $feedback
                            )
                        )
                        , 'text/html'
                    );
                $this->get('mailer')->send($swift);
                return new Response("ok");
            }
        }

        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('contacts');

        return $this->render('SiteMainBundle:Page:feedbackCompany.html.twig', array(
            'form' => $form->createView(),
            "page" => $page
        ));
    }

    public function videoAction()
    {
        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('video');
        $videos = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Video')->findAll();
        return $this->render('SiteMainBundle:Video:index.html.twig', array(
            'videos' => $videos,
            "page" => $page
        ));
    }

    public function videoOneAction($id)
    {
        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('video');
        $video = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Video')->find($id);
        return $this->render('SiteMainBundle:Video:one.html.twig', array(
            'video' => $video,
            "page" => $page
        ));
    }
}
