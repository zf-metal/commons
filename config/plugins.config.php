<?php

namespace ZfMetal\Commons;

return [
    'controller_plugins' => [
        'factories' => [
            \ZfMetal\Commons\Controller\Plugin\FormBuilder::class => \ZfMetal\Commons\Factory\Controller\Plugin\FormBuilderFactory::class,
        ],
        'aliases' => [
            'formBuilder' => \ZfMetal\Commons\Controller\Plugin\FormBuilder::class,
        ]
    ]
];
