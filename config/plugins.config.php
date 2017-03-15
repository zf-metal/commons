<?php

namespace ZfMetal\Commons;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controller_plugins' => [
        'factories' => [
            \ZfMetal\Commons\Controller\Plugin\FormBuilder::class => InvokableFactory::class,
            \ZfMetal\Commons\Controller\Plugin\FormProcess::class => InvokableFactory::class,
        ],
        'aliases' => [
            'formBuilder' => \ZfMetal\Commons\Controller\Plugin\FormBuilder::class,
            'formProcess' => \ZfMetal\Commons\Controller\Plugin\FormProcess::class,
        ]
    ]
];
