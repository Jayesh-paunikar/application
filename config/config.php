<?php
/**
 *
 */

use Framework\Service\Container\Container;
use Framework\Event\Config\Events;

return [
    'alias'       => include __DIR__ . '/alias.php',
    'events'      => new Events(include __DIR__ . '/event.php'),
    'services'    => new Container(include __DIR__ . '/service.php'),
    'routes'      => include __DIR__ . '/route.php',
    'translator'  => include __DIR__ . '/i18n.php',
    'templates'   => include __DIR__ . '/templates.php'
];
