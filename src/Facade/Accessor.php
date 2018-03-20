<?php

namespace ZfMetal\Commons\Facade;


use Zend\ServiceManager\ServiceLocatorInterface;

abstract class Accessor
{
    /**
     * @var \Zend\ServiceManager\ServiceLocatorInterface
     */
    static private $serviceLocator;

    /**
     * Prevent misuse. Instances should not be extending this class, or black magic happens.
     */
    final private function __construct()
    {
    }

    /**
     * Sets the service locator
     * @param ServiceLocatorInterface $serviceLocator
     */
    final public static function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        self::$serviceLocator = $serviceLocator;
    }

    /**
     * Unsets the service locator.
     */
    final public static function unsetServiceLocator()
    {
        self::$serviceLocator = null;
    }

    /**
     * Returns the service from the service locator
     * @return object
     *
     * @throws \LogicException If no service locator has been set
     */
    private static function getService()
    {
        if (!isset(self::$serviceLocator)) {
            throw new \LogicException("Service locator has not been set yet");
        }
        return self::$serviceLocator->get(static::getServiceName());
    }

    /**
     * This should be the associated service name to this facade.
     * This value will be passed into the service locator.
     * @return string The name of the associated service
     *
     * @throws \LogicException When not implemented by parent class
     */
    public static function getServiceName()
    {
        throw new \LogicException(__METHOD__ . ' must be implemented by subclass');
    }

    /**
     * Calls the instance methods
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     *
     * @throws \LogicException
     */
    public static function __callStatic($name, array $arguments)
    {
        $callable = [
            self::getService(),
            $name,
        ];
        if (empty($arguments)) {
            return $callable();
        } else {
            return call_user_func_array($callable, $arguments);
        }
    }
}