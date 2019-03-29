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
        ],

    ],
];