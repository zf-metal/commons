<?php

namespace ZfMetal\Commons\Facade;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\CallbackHandler;

/**
 * Bootstraps the facade system for the zend framework
 * @author marcrubio
 *
 */
class BootstrapListener implements ListenerAggregateInterface
{
    /**
     * @var CallbackHandler
     */
    private $listener;

    /**
     * @see \Zend\EventManager\ListenerAggregateInterface::attach()
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listener = $events->attach(MvcEvent::EVENT_BOOTSTRAP, function (MvcEvent $e) {
            $serviceManager = $e->getApplication()->getServiceManager();
            Accessor::setServiceLocator($serviceManager);
        }, 2);
    }

    /**
     * @see \Zend\EventManager\ListenerAggregateInterface::detach()
     */
    public function detach(EventManagerInterface $events)
    {
        $events->detach($this->listener);
    }
}