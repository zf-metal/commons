<?php

namespace ZfMetal\Commons\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormElementManagerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $formElementManager = $container->get('FormElementManager');
        return new \ZfMetal\Commons\Controller\Plugin\FormElementManager($formElementManager);
    }

}
