<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Content\Doctrine;

use MSBios\Content\Controller\IndexController;
use MSBios\Doctrine\Factory\ObjectableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                ObjectableFactory::class,
        ],
        'aliases' => [
            IndexController::class =>
                Controller\IndexController::class
        ]
    ],
    \MSBios\Theme\Module::class => [
        'themes' => [
            'default' => [
                'template_path_stack' => [
                    __DIR__ . '/../themes/default/view/',
                ],
                'translation_file_patterns' => [
                    [
                        'type' => 'gettext',
                        'base_dir' => __DIR__ . '/../themes/default/language/',
                        'pattern' => '%s.mo',
                    ],
                ],
                'widget_manager' => [
                    'template_map' => [
                        // ...
                    ],
                    'template_path_stack' => [
                        __DIR__ . '/../themes/default/widget/'
                    ],
                ],
            ]
        ]
    ]
];
