<?php

namespace ZfMetal\Commons\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormBuilderFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $serviceFormBuilder = $container->get('zf-metal-form-builder');

        return new \ZfMetal\Commons\Controller\Plugin\FormBuilder($serviceFormBuilder);
    }

}
