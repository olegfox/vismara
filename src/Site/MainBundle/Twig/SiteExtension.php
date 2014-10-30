<?php

namespace Site\MainBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Locale\Locale;

class SiteExtension extends \Twig_Extension
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getGlobals()
    {
        // Either just return the container available in templates, so to get parameters: {{ container.getParameter('param') }}
        return array(
            'container' => $this->container,
        );

        // OR make every parameter a twig global variable
        $params = $this->container->getParameterBag()->all();
        $params['container'] = $this->container;

        return $params;
    }

    public function getFunctions()
    {
        return array(
            'media_public_url' => new \Twig_Function_Method($this, 'getMediaPublicUrl'),
        );
    }

    public function getMediaPublicUrl($media, $format)
    {
            $provider = $this->container->get($media->getProviderName());

            return $provider->generatePublicUrl($media, $format);
    }

    public function getName()
    {
        return 'site_extension';
    }
}