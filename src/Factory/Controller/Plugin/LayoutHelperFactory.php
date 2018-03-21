<?php

namespace ZfMetal\Commons\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class LayoutHelperFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $layout = $container->get('zf-metal-layout');

        return new \ZfMetal\Commons\Controller\Plugin\LayoutHelper($layout);
    }

}
