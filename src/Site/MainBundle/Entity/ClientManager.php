<?php

namespace Site\MainBundle\Entity;

use Site\MainBundle\Entity\Client;

use Doctrine\ORM\Mapping as ORM;

class ClientManager
{
	protected $controller;
	protected $em;
	protected $doctrine;
	
	public function __construct($controller)
	{
		$this->controller = $controller;
		$this->em = $controller->getDoctrine()->getManager();
		$this->doctrine = $controller->getDoctrine();
	}
	
	protected function getRepository()
	{
		return $this->doctrine->getRepository('SiteMainBundle:Client');
	}
	
	public function registerClient(Client $client)
	{
		$factory = $this->controller->get('security.encoder_factory');
		$encoder = $factory->getEncoder($client);

        $client->setUsername($client->getEmail());
        $passwordText = $client->getZone()->getPasswordText();
		$password = $encoder->encodePassword($passwordText, $client->getSalt());
        $client->setPassword($password);
        $client->setPasswordText($passwordText);
		$this->em->persist($client);
		$this->em->flush();

        $swift = \Swift_Message::newInstance()
            ->setSubject('VismaraDesign New Register')
            ->setFrom(array('kontakti@vismara.it' => "VismaraDesign New Register"))
            ->setTo('kontakti@vismara.it')
            ->setBody(
                $this->renderView(
                    'SiteMainBundle:Client:register.message.html.twig',
                    array(
                        'client' => $client
                    )
                )
                , 'text/html'
            );
        $this->get('mailer')->send($swift);

		return $client;
	}
	
}


