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
use Framework\View\Manager\ManagerInterface as ViewManager;
use Request\RequestInterface as Request;
use Response\ResponseInterface as Response;

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
/*function home(Request $request, Response $response, ViewManager $vm, array $args = [])
{
    $m = new Home\ViewModel;

    $m->setTemplate($vm->param('view.templates.home'));
    $m->setViewManager($vm);

    $m->args = $args;

    return $m;
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
            'controller' => 'Home',
            'children' => [
                'default' => Builder::definition([
                    'name'       => 'default',
                    'route'      => '/:controller[/:action]',
                    'defaults'   => [
                        'controller' => 'index',
                        'action'     => 'index'
                    ],
                    'wildcard'   => false,
                    /*'controller' => function(Request $request, Response $response, ViewManager $vm) {
                        //var_dump($vm);exit;
                        return $this->trigger(['Blog\Create', $request, $response]);
                        //return $this->trigger('CreateBlog', [$request, $response]);
                        //return $this->trigger('CreateBlog', ['request' => $request, 'response' => $response]);
                    },*/
                    //'controller' => '@Blog\Service.createBlog',
                    /*'controller' => function(Response $response, Request $request, ViewManager $vm, array $args = []) {

                        $m = new Home\ViewModel;
                        $m->setTemplate($vm->param('view.templates.home'));
                        $m->setViewManager($vm);

                        $m->args = $args;

                        return $m;
                    },*/
                    'controller' => 'Home',
                    //'controller' => '@Home', //will end up trying to call above home() function if nothing created
                    //'controller' => '@Home.test',
                    /*'controller' => new Call(
                        new Service('Home\Factory', [new ServiceManagerLink]),
                        ['config' => new Dependency('Config'), 'vm' => new Dependency('ViewManager')]
                    ),*/
                    //'controller' => '@Home\Controller::staticTest',
                    //'controller' => ['Home\Controller', 'staticTest'],
                    //'controller' => [new Dependency('Home'), 'test'],
                    //'controller' => 'Home\Controller::staticTest', //error
                    //'controller' => new Home\Controller, //works but no view model provided
                    //'controller' => new Factory(Home\Factory::class),
                    //'controller' => new Service('Home'),
                    //'controller' => new Invoke([new Service('Home'), 'test'], ['a' => '1']),
                    /*'controller' => new ServiceConfig([
                        'name' => Home\Controller::class,
                        'args' => [new ServiceManagerLink],
                        'calls' => [
                            'setViewModel' => new Hydrator(
                                Home\ViewModel::class,
                                [
                                    'setTemplate'    => new Param('view.templates.home'),
                                    'setViewManager' => new Dependency('View\Manager'),
                                    //['setTemplate', ['staticA', 'staticB']],
                                    [['Home\Controller', 'staticCall'], ['staticA', 'staticB']],
                                    //['Home\Controller', 'staticCall']
                                ]
                            )
                        ]
                    ]),*/
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
