<?php
/**
 *
 */

//demo object property access, e.g new Param('view.template.layout')
return [
    'templates' => (object) [
        'layout'          => __DIR__ . '/../view/layout/layout.phtml',
        'error/exception' => __DIR__ . '/../vendor/mvc5/framework/src/View/Exception/exception.phtml',
        'error/404'       => __DIR__ . '/../view/error/404.phtml',
        'home'            => __DIR__ . '/../view/home/index.phtml',
    ],
    'aliases' => [
        'url'       => 'Route\Generator\Plugin',
        'translate' => 'Translator\Plugin',
    ]
];
