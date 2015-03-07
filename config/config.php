<?php
/**
 *
 */

use Mvc5\Service\Container\Container;

return [
    'alias'     => include __DIR__ . '/alias.php',
    'events'    => include __DIR__ . '/event.php',
    'services'  => new Container(include __DIR__ . '/service.php'),
    'routes'    => include __DIR__ . '/route.php',
    'templates' => include __DIR__ . '/templates.php'
];
