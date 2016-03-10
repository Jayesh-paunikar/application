<?php
/**
 *
 */

use Mvc5\Config;
use Mvc5\Plugin\Param;

return [
    'services' => new Config([
        'home' => Home\Controller::class,
        'controller2' => [Blog\Controller::class, 'template' => new Param('templates.blog')],
        'controller' => 'controller2', //locally resolved
        'container' => [], //new Config, //local container
    ]),
    'templates' => [
        'blog' => __DIR__ . '/../view/blog/index.phtml',
    ]
];
