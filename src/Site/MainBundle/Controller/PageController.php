<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Site\MainBundle\Entity\Feedback;
use Site\MainBundle\Entity\FeedbackCompany;
use Site\MainBundle\Form\Type\FeedbackFormType;
use Site\MainBundle\Form\Type\FeedbackCompanyFormType;


class PageController extends Controller
{

    public function indexAction(Request $request, $slug)
    {
        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug($slug);
        $params = array(
            "page" => $page
        );
        if($slug == 'kontaktyi'){
            $maps = $this->getDoctrine()->getRepository('SiteMainBundle:Map')->findAll();
            $params['maps'] = $maps;
        }
        return $this->render('SiteMainBundle:Page:index.html.twig', $params);

    }

    public function feedbackChooseAction(){
        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('kontaktyi');

        return $this->render('SiteMainBundle:Page:feedbackChoose.html.twig', array(
            "page" => $page
        ));
    }

    public function feedbackPrivatePersonAction(Request $request)
    {
        $feedback = new Feedback();
        $form = $this->createForm(new FeedbackFormType(), $feedback);
        if ($request->isMethod('POST')) {
            $form->bind($request);

            $swift = \Swift_Message::newInstance()
                ->setSubject('VismaraDesign')
                ->setFrom(array('kontakti@vismara.it' => "VismaraDesign"))
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

        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('kontaktyi');

        return $this->render('SiteMainBundle:Page:feedbackPrivatePerson.html.twig', array(
            'form' => $form->createView(),
            "page" => $page
        ));
    }

    public function feedbackCompanyAction(Request $request)
    {
        $feedback = new FeedbackCompany();
        $form = $this->createForm(new FeedbackCompanyFormType(), $feedback);
        if ($request->isMethod('POST')) {
            $form->bind($request);

            $swift = \Swift_Message::newInstance()
                ->setSubject('VismaraDesign')
                ->setFrom(array('kontakti@vismara.it' => "VismaraDesign"))
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

        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('kontaktyi');

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
}
