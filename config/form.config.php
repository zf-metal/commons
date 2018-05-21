<?php

return [
    'form_elements' => [
        'initializers' => [
            'ObjectManagerInitializer' => function ($container,  $formElement) {
                if ($formElement instanceOf \DoctrineModule\Persistence\ObjectManagerAwareInterface) {
                    $em = $container->get("doctrine.entitymanager.orm_default");
                    $formElement->setObjectManager($em);
                }
            }
        ]
    ],
];