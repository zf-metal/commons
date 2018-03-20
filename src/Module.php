<?php

namespace ZfMetal\Commons;

use ZfMetal\Commons\Facade\BootstrapListener;

class Module {

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(\Zend\Mvc\MvcEvent $mvcEvent)
    {
        //Init Facade
        $bootstrapListener = new BootstrapListener();
        $bootstrapListener->attach($mvcEvent->getApplication()->getEventManager());

    }


}
