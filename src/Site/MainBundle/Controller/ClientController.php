<?php

namespace Site\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Site\MainBundle\Entity\Client;
use Site\MainBundle\Form\Type\ClientType;
use Site\MainBundle\Entity\ClientManager;

class ClientController extends Controller
{
    /**
     * Аутентификация пользователя
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        return $this->render(
            'SiteMainBundle:Client:login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * Проверка формы аутентификации
     */
    public function loginCheckAction(Request $request)
    {
        if ($this->get("request")->getMethod() == "POST")
        {

            $username = $request->get("_username");
            $password = $request->get("_password");

            $repository = $this->getDoctrine()->getRepository('SiteMainBundle:Client');

            $client = $repository->findOneBy(array('username' => $username, 'passwordText' => $password));

            if($client){

                $token = new UsernamePasswordToken($client, null, 'default', array('ROLE_USER'));
                $this->get('security.context')->setToken($token);

                return $this->redirect($this->generateUrl('client_catalogs', array('slug' => $client->getZone()->getSlug())));
            }

        }

        return $this->redirect($this->generateUrl('client_login'));
    }

    /**
     * Выход пользователя из системы
     */
    public function logoutAction(){

    }

    public function registerAction(Request $request){
        $client = new Client();
        $form = $this->createForm(new ClientType(), $client);

        if($request->isMethod("POST")){
            $form->handleRequest($request);

            if($form->isValid()){

                $cm = new ClientManager($this);

                if($cm->registerClient($client)){
                    return new Response($this->generateUrl('client_register_complete'));
                }

                throw $this->createNotFoundException($this->get('translator')->trans('backend.register_error'));
            }
        }

        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('catalogue');

        $params = array(
            "page" => $page,
            "form" => $form->createView()
        );
        return $this->render('SiteMainBundle:Client:index.html.twig', $params);
    }

    public function registerCompleteAction(){
        $page = $this->getDoctrine()
            ->getRepository('SiteMainBundle:Menu')->findOneBySlug('catalogue');

        $params = array(
            "page" => $page
        );
        return $this->render('SiteMainBundle:Client:message.html.twig', $params);
    }

    public function catalogsAction($slug){
        $pricelists = $this->getDoctrine()->getRepository("SiteMainBundle:Catalogs")->findBySlugZone($slug);
        $catalogs = $this->getDoctrine()->getRepository("SiteMainBundle:Catalogs")->findCatalogs();;
        $colorGroups = $this->getDoctrine()->getRepository("SiteMainBundle:ColorGroup")->findAll();
        $page = $this->getDoctrine()->getRepository("SiteMainBundle:Menu")->findOneBy(array('slug' => 'catalogue'));

        $params = array(
            "catalogs" => $catalogs,
            "pricelists" => $pricelists,
            "colorGroups" => $colorGroups,
            "page" => $page
        );
        return $this->render('SiteMainBundle:Client:catalogs.html.twig', $params);
    }
}
