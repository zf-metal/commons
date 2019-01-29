<?php

return [
    'form_elements' => [
        'initializers' => [
            'ObjectManagerInitializer' => function ($container,  $formElement) {
                if ($formElement instanceOf \DoctrineModule\Persistence\ObjectManagerAwareInterface) {
                    $em = $container->get("doctrine.entitymanager.orm_default");
                    $formElement->setObjectManager($em);
                    $formElement->setHydrator(new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($em));
                }
            }
        ]
    ],
    'validators' => [
        'factories' => [
            'UniqueObject' => \ZfMetal\Commons\Factory\Validator\UniqueObjectFactory::class,
            'ObjectExists' => \ZfMetal\Commons\Factory\Validator\ObjectExistsFactory::class,
            'NoObjectExists' => \ZfMetal\Commons\Factory\Validator\NoObjectExistsFactory::class,
        ],

    ],
];