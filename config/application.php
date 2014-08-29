<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Service\Container\Container;
use Framework\Event\Config\Config as Events;

return new Config([
    'controllers' => new Events(include __DIR__ . '/controller.php'),
    'events'      => new Events(include __DIR__ . '/event.php'),
    'services'    => new Container(include __DIR__ . '/service.php'),
    'routes'      => new Config(include __DIR__ . '/route.php'),
    'translator'  => new Config(include __DIR__ . '/i18n.php'),
    'view'        => new Config(include __DIR__ . '/view.php')
]);
