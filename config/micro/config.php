<?php
/**
 *
 */

use Framework\Service\Config\Service\Service;
use Framework\Service\Container\Container;

return array_merge(
    include __DIR__ . '/../config.php',
    [
        'routes'   => include __DIR__ . '/route.php',
        'services' => new Container(array_merge(
            include __DIR__ . '/../service.php',
            [
                'Layout'  => new Service(Framework\View\Layout\Model::class, ['micro:layout']),
            ]
        ))
    ]
);
