<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Service\Container\Container;
use Framework\Event\Config\Config as Events;

return new Config([
    'alias'       => include __DIR__ . '/alias.php',
    'events'      => new Events(include __DIR__ . '/event.php'),
    'services'    => new Container(include __DIR__ . '/service.php'),
    'routes'      => include __DIR__ . '/route.php',
    'translator'  => include __DIR__ . '/i18n.php',
    'view'        => include __DIR__ . '/view.php'
]);
