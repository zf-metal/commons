<?php

namespace ZfMetal\Commons;

return [
    'service_manager' => [
        'factories' => [
             'zf-metal-commons.options' => \ZfMetal\Commons\Factory\Options\ModuleOptionsFactory::class,
        ],
        'aliases' => [
        ]
    ]
];

