<?php

namespace ZfMetal\Commons\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormBuilderFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $zendFormFactory = $this->container->get('zf-metal-zend-form-factory');

        $formBuilder = new \ZfMetal\Commons\Controller\Plugin\FormBuilder();
        $formBuilder->setZendFormFactory($zendFormFactory);
        return $formBuilder;
    }

}
