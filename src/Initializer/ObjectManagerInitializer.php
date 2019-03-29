<?php
/**
 * Created by IntelliJ IDEA.
 * User: crist
 * Date: 29/3/2019
 * Time: 19:03
 */

namespace ZfMetal\Commons\Initializer;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

class ObjectManagerInitializer implements InitializerInterface
{

    /**
     * Initialize the given instance
     *
     * @param  ContainerInterface $container
     * @param  object $instance
     * @return void
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceOf \DoctrineModule\Persistence\ObjectManagerAwareInterface) {
            $em = $container->get("doctrine.entitymanager.orm_default");
            $instance->setObjectManager($em);
            $instance->setHydrator(new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($em));
        }
    }
}