<?php

namespace ZfMetal\Commons\Factory\Options;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


class ModuleOptionsFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
         $config = $container->get('Config');
         
         return new \ZfMetal\Commons\Options\ModuleOptions(isset($config['zf-metal-commons.options']) ? $config['zf-metal-commons.options'] : array());
    }

}
