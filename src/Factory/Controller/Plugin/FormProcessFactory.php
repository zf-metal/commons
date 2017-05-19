<?php

namespace ZfMetal\Commons\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormProcessFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $serviceFormProcess = $container->get('zf-metal-form-process');

        return new \ZfMetal\Commons\Controller\Plugin\FormProcess($serviceFormProcess);
    }

}
