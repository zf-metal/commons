<?php

namespace ZfMetal\Commons\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormProcessFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        /* @var $request \Zend\Http\Request */
        $request = $container->get('application')->getMvcEvent()->getRequest();

        /* @var $flashMessenger \Zend\Mvc\Plugin\FlashMessenger\FlashMessenger */
        $flashMessenger = $container->get('flashmessenger');

        /* @var $moduleOptions \ZfMetal\Commons\Options\ModuleOptions */
        $moduleOptions = $container->get('zf-metal-commons.options');

        return new \ZfMetal\Commons\Service\FormProcess($request, $flashMessenger,$moduleOptions);
    }

}
