<?php

namespace ZfMetal\Commons;

return [
    'service_manager' => [
        'factories' => [
            'zf-metal-commons.options' => \ZfMetal\Commons\Factory\Options\ModuleOptionsFactory::class,
            'zf-metal-doctrine-annotation-builder' => \ZfMetal\Commons\Factory\DoctrineFormAnnotationBuilderFactory::class,
            'zf-metal-zend-form-factory' => \ZfMetal\Commons\Factory\ZendFormFactory::class,
        ],
        'aliases' => [
        ]
    ]
];

