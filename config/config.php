<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Route\Definition\RouteDefinition;
use Framework\Service\Container\Container;

return [
    'alias'     => include __DIR__ . '/alias.php',
    'events'    => new Config(include __DIR__ . '/event.php'),
    'services'  => new Container(include __DIR__ . '/service.php'),
    'routes'    => new RouteDefinition(include __DIR__ . '/route.php'),
    'templates' => new Config(include __DIR__ . '/templates.php')
];
