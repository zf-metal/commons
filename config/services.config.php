<?php

namespace ZfMetal\Commons;

return [
    'service_manager' => [
        'factories' => [
            'zf-metal-commons.options' => \ZfMetal\Commons\Factory\Options\ModuleOptionsFactory::class,
            'zf-metal-doctrine-annotation-builder' => \ZfMetal\Commons\Factory\DoctrineFormAnnotationBuilderFactory::class,
            'zf-metal-zend-form-factory' => \ZfMetal\Commons\Factory\ZendFormFactory::class,
            'zf-metal-form-builder' => \ZfMetal\Commons\Factory\Service\FormBuilderFactory::class,
            'zf-metal-form-process' => \ZfMetal\Commons\Factory\Service\FormProcessFactory::class,
        ],
        'aliases' => [
        ]
    ]
];

