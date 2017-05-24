<?php

namespace ZfMetal\Commons\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ExportToExcelFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $config = $container->get('Config');

        return new \ZfMetal\Commons\Controller\Plugin\ExportToExcel(isset($config['zf-metal-commons.exports']) ? $config['zf-metal-commons.exports'] : array());
    }

}
