<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Event\Config\Events;
use Framework\Route\Definition\RouteDefinition;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Router\Router;

return [
    'definitions' => new Config([
        'error' => new RouteDefinition([
            'name'       => 'error',
            'route'      => '/error',
            'controller' => 'Controller\Error',
            'regex'      => '/error',
            'tokens'     => [['literal', '/error']]
        ])
    ]),
    'events' => new Events([
        'Route\Match' => [
            [
                'Route\Match\Scheme',
                'Route\Match\Hostname',
                'Route\Match\Path',
                'Route\Match\Wildcard',
                'Route\Match\Method'
            ]
        ],
        'Route\Dispatch' => [
            [
                'Route\Dispatch\Filter',
                new Router(new Param('routes.definitions.error'))
            ]
        ]
    ])
];
