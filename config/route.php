<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Event\Config\Config as Events;
use Framework\Route\Definition\Definition;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;

//use Framework\Route\Definition\Builder\Builder;
/*var_export(Builder::definition([
    'name'       => 'error',
    'route'       => '/error',
    'controller' => 'Controller\Error\Listener',
]));
exit;*/
return [
    'definitions' => new Config([
        'home' => new Definition([
            'name'       => 'home',
            'scheme'     => null,
            'hostname'   => null,
            'method'     => null,
            'route'       => '/',
            'defaults'   => [],
            'controller' => 'Home',
            'paramMap'   => [],
            'regex'      => '/',
            'tokens'     => [['literal', '/']]
        ]),
        'application' => new Definition([
            'name'       => 'application',
            'scheme'     => null,
            'hostname'   => null,
            'method'     => null,
            'route'       => '/application',
            'defaults'   => [],
            'controller' => 'Home',
            'children' => [
                'default' => new Definition([
                    'name'       => 'default',
                    'scheme'     => null,
                    'method'     => null,
                    'route'       => '/[:a[/:b]]',
                    'defaults'   => [],
                    'wildcard'   => true,
                    'controller' => 'Home',
                    'paramMap'   => ['param1' => 'a', 'param2' => 'b'],
                    'regex'      => '/(?:(?P<param1>[^/]+)(?:/(?P<param2>[^/]+))?)?',
                    'tokens'     => [['literal', '/'], ['optional-start'], ['parameter', 'a', null], ['optional-start'], ['literal', '/', ], ['parameter', 'b', null], ['optional-end'], ['optional-end']]
                ])
            ],
            'paramMap' => [],
            'regex'    => '/application',
            'tokens'   => [['literal', '/application']]
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
