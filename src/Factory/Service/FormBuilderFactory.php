<?php

namespace ZfMetal\Commons\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormBuilderFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $zendFormFactory = $container->get('zf-metal-zend-form-factory');

        $formBuilder = new \ZfMetal\Commons\Service\FormBuilder();
        $formBuilder->setZendFormFactory($zendFormFactory);
        return $formBuilder;
    }

}
