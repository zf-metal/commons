<?php

namespace ZfMetal\Commons\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormBuilderFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new \ZfMetal\Commons\Controller\Plugin\FormBuilder();
    }

}
