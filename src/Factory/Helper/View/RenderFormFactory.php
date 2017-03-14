<?php

namespace ZfMetal\Security\Factory\Helper\View;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class RenderFormFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $moduleOptions = $container->get('zf-metal-commons.options');
        return new \ZfMetal\Commons\Helper\View\RenderForm($moduleOptions);
    }

}
