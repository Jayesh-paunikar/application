<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Event\Config\Config as Events;
use Framework\Route\Definition\Definition;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;

use Framework\Route\Definition\Builder\Builder;
/*var_export(Builder::definition([
    'name'       => 'default',
    'route'       => '/[:controller[/:action]]',
    'controller' => 'Home',
    'constraints' => [
        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*'
    ],
    'defaults' => [
        'controller' => 'Home',
        'action'     => 'index'
    ]
]));
exit;*/
return [
    'definitions' => new Config([
        'home' => Builder::definition([
            'name'       => 'default',
            'route'       => '/',
            'controller' => 'Home'
        ]),
        'application' => Builder::definition([
            'name'       => 'application',
            'route'      => '/application',
            'controller' => 'Home',
            'children' => [
                'default' => Builder::definition([
                    'name'       => 'default',
                    'route'       => '/[:a[/:b]]',
                    'defaults'   => [
                        'a' => 'jack',
                        'b' => 'jill'
                    ],
                    'wildcard'   => false,
                    'controller' => 'Home',
                    'constraints' => [
                        'a' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'b' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ]
                ])
            ],
        ]),
        'error' => new Definition([
            'name'       => 'error',
            'scheme'     => null,
            'hostname'   => null,
            'method'     => null,
            'route'       => '/error',
            'defaults'   => [],
            'controller' => 'Controller\Error',
            'paramMap'   => [],
            'regex'      => '/error',
            'tokens'     => [['literal', '/error']]
        ])
    ]),
    'events' => new Events([
        'Route\Match\Event' => [
            [
                'Route\Match\Scheme',
                'Route\Match\Hostname',
                'Route\Match\Path',
                'Route\Match\Wildcard',
                'Route\Match\Method'
            ]
        ],
        'Route\Dispatch\Event' => [
            [
                'Route\Dispatch\Filter',

                new Service('Route\Dispatch', [new Param('routes.definitions.home')]),

                new Service('Route\Dispatch', [new Param('routes.definitions.application')]),

                new Service('Route\Dispatch', [new Param('routes.definitions.error')])
            ]
        ]
    ])
];
