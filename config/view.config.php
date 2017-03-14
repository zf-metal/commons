<?php

namespace ZfMetal\Commons;

return [
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view'
        ],
    ],
    'view_helpers' => [
        'factories' => [
            \ZfMetal\Commons\Helper\View\RenderForm::class => \ZfMetal\Commons\Factory\Helper\View\RenderFormFactory::class,
            \ZfMetal\Commons\Helper\View\RenderFormElement::class => \ZfMetal\Commons\Factory\Helper\View\RenderFormElementFactory::class,
        ],
        'aliases' => [
            'renderForm' => \ZfMetal\Commons\Helper\View\RenderForm::class,
            'renderFormElement' => \ZfMetal\Commons\Helper\View\RenderFormElement::class,
        ]
    ],
];
