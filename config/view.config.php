<?php

namespace ZfMetal\Commons;

use Zend\ServiceManager\Factory\InvokableFactory;

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
            \ZfMetal\Commons\Helper\View\Flash::class => InvokableFactory::class,
            \ZfMetal\Commons\Helper\View\FlashCurrent::class => InvokableFactory::class,
            \ZfMetal\Commons\Helper\View\JQSelectPopulate::class => InvokableFactory::class,
            \ZfMetal\Commons\Helper\View\RenderMenu::class => InvokableFactory::class,
            \ZfMetal\Commons\Helper\View\BootstrapModal::class => InvokableFactory::class,
        ],
        'aliases' => [
            'renderForm' => \ZfMetal\Commons\Helper\View\RenderForm::class,
            'renderFormElement' => \ZfMetal\Commons\Helper\View\RenderFormElement::class,
            'flash' => \ZfMetal\Commons\Helper\View\Flash::class,
            'flashCurrent' => \ZfMetal\Commons\Helper\View\FlashCurrent::class,
            'JQSelectPopulate' => \ZfMetal\Commons\Helper\View\JQSelectPopulate::class,
            'renderMenu' => \ZfMetal\Commons\Helper\View\RenderMenu::class,
            'bootstrapModal' => \ZfMetal\Commons\Helper\View\BootstrapModal::class,
        ]
    ],
];
