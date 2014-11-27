<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Route\Definition\RouteDefinition;
use Framework\Service\Container\Container;
use Framework\Event\Config\Events;

return [
    'alias'     => include __DIR__ . '/alias.php',
    //'events'    => new Events(include __DIR__ . '/event.php'),
    'events'    => new Events(include __DIR__ . '/../vendor/mvc5/framework/test/config/event.php'),
    'services'  => new Container(include __DIR__ . '/service.php'),
    //'routes'    => new RouteDefinition(include __DIR__ . '/route.php'),
    'routes'    => new RouteDefinition(include __DIR__ . '/../vendor/mvc5/framework/test/config/route.php'),
    'templates' => new Config(include __DIR__ . '/templates.php')
];
