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
];
