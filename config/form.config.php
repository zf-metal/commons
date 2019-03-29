<?php

return [
    'form_elements' => [
        'initializers' => [
            'ObjectManagerInitializer' => \ZfMetal\Commons\Initializer\ObjectManagerInitializer::class
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