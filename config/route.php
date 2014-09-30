<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Event\Config\Config as Events;
use Framework\Route\Definition\Definition;
use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Config as ServiceConfig;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Factory\Factory;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;
use Framework\Service\Config\ServiceManagerLink\ServiceManagerLink;

//demo route controller
use Framework\View\Model\Model as ViewModel;

//demo route builder
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

//demo route controller
/*function home() {
    var_dump(__FILE__, func_get_args());
}*/
return [
    'definitions' => new Config([
        'home' => Builder::definition([
            'name'       => 'default',
            'route'      => '/',
            'controller' => 'Home'
        ]),
        'application' => Builder::definition([
            'name'       => 'application',
            'route'      => '/application',
            'controller' => 'Home', //this will use home() if it exists !?!
            'children' => [
                'default' => Builder::definition([
                    'name'       => 'default',
                    'route'      => '/:controller[/:action]',
                    'defaults'   => [
                        'controller' => 'index',
                        'action'     => 'index'
                    ],
                    'wildcard'   => false,
                    /*'controller' => function() {
                        $config      = $this->config();
                        $viewManager = $this->get('View\Manager');

                        $vm = new Home\ViewModel;
                        $vm->setTemplate($config->get('view')->get('templates')['home']); //nicer if had $this->param()
                        $vm->setViewManager($viewManager);

                        $vm->args = func_get_args();

                        return $vm;
                    },*/
                    //'controller' => 'Home', //if no config is found then home() will be called if it exists
                    'controller' => '@Home.test',
                    //'controller' => new Factory(Home\Factory::class),
                    //'controller' => Home\Factory::class, //error - sm needed in constructor
                    //'controller' => new Service('Home'), //this won't call home()
                    /*'controller' => new ServiceConfig([
                        'name' => Home\Controller::class,
                        'args' => [new ServiceManagerLink],
                        'calls' => [
                            'setViewModel' => new Hydrator(
                                Home\ViewModel::class,
                                [
                                    'setTemplate'    => new Param('view.templates.home'),
                                    'setViewManager' => new Dependency('View\Manager')
                                ]
                            )
                        ]
                    ]),*/
                    //'controller' => new Invoke([new Service('Home'), 'test']),
                    'constraints' => [
                        'controller' => '[a-zA-Z0-9_-]',
                        'action'     => '[0-9]' //needs fixing?
                    ]
                ])
            ],
        ]),
        'error' => new Definition([
            'name'       => 'error',
            'route'      => '/error',
            'controller' => 'Controller\Error',
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
