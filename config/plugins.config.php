<?php

namespace ZfMetal\Commons;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controller_plugins' => [
        'factories' => [
            \ZfMetal\Commons\Controller\Plugin\FormBuilder::class => \ZfMetal\Commons\Factory\Controller\Plugin\FormBuilderFactory::class,
            \ZfMetal\Commons\Controller\Plugin\FormProcess::class => \ZfMetal\Commons\Factory\Controller\Plugin\FormProcessFactory::class,
        ],
        'aliases' => [
            'formBuilder' => \ZfMetal\Commons\Controller\Plugin\FormBuilder::class,
            'formProcess' => \ZfMetal\Commons\Controller\Plugin\FormProcess::class,
        ]
    ]
];
