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
        $passwordText = substr(sha1(uniqid(mt_rand(), true)), 0, 13);
		$password = $encoder->encodePassword($passwordText, $client->getSalt());
        $client->setPassword($password);
        $client->setPasswordText($passwordText);
		$this->em->persist($client);
		$this->em->flush();

		return $client;
	}
	
}


