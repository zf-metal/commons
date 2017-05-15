<?php

namespace ZfMetal\Commons\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use \DoctrineORMModule\Form\Annotation\AnnotationBuilder;

class DoctrineFormAnnotationBuilderFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL) {

        $factory = $container->get('zf-metal-zend-form-factory');

        if ($options['entityManager']) {
            $em = $container->get($options['entityManager']);
        } else {
            $em = $container->get('doctrine.entitymanager.orm_default');
        }


        $builder = new AnnotationBuilder($em);
        $builder->setFormFactory($factory);

        return $builder;
    }

}
