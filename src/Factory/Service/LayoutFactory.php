<?php

namespace ZfMetal\Commons\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use ZfMetal\Commons\Options\ModuleOptions;
use ZfMetal\Commons\Service\Layout;

class LayoutFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        /** @var ModuleOptions $mo */
        $mo = $container->get('zf-metal-commons.options');
        $layout = new Layout($mo->getTitle(),$mo->getTabTitle(),$mo->getDomain());
        return $layout;
    }

}
