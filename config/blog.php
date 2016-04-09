<?php
/**
 *
 */

use Mvc5\Plugin\Param;
use Request\Request;

return [
    'services' => [
        'home' => Home\Controller::class,
        'controller2' => function(Request $request) {
            return $this->plugin(Blog\Controller::class, ['template' => new Param('templates.blog')]);
        },
        'Home\Controller2' => function(Request $request, Blog\Model $model) {
            return new Blog\Controller($model, __DIR__ . '/../view/blog/index.phtml');
        },

        //'controller' => 'controller2', //locally resolved
        'controller' => 'Home\Controller2', //locally resolved
        'middleware' => [Blog\Middleware::class, 'template' => new Param('templates.blog')],
    ],
    'templates' => [
        'blog' => __DIR__ . '/../view/blog/index.phtml',
    ]
];
