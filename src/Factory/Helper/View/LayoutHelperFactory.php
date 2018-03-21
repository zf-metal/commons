<?php

namespace ZfMetal\Commons\Factory\Helper\View;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class LayoutHelperFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $layout = $container->get('zf-metal-layout');
        return new \ZfMetal\Commons\Helper\View\LayoutHelper($layout);
    }

}
