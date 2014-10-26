<?php
/**
 *
 */

use Framework\Config\Config;
use Framework\Event\Config\Events;
use Framework\Route\Definition\RouteDefinition;
use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Config as ServiceConfig;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Factory\Factory;
use Framework\Service\Config\Filter\Filter;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Router\Router;
use Framework\Service\Config\Service\Service;
use Framework\Service\Config\ServiceManagerLink\ServiceManagerLink;

//demo route controller
use Framework\View\Manager\ViewManager;
use Request\Request;
use Response\Response;

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
function test(Request $request, Response $response, ViewManager $vm, array $args = [])
{
    $m = new Home\Model;

    $m->setTemplate($vm->param('templates.home'));
    $m->setViewManager($vm);

    $m->args = $args;

    return $m;
}
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
                    /*'controller' => function(Request $request, Response $response) {
                        $response = $this->trigger('Blog\Create', ['request' => $request, 'response' => $response], $this);
                        //$response = $this->trigger('blog:create', ['request' => $request, 'response' => $response], $this);
                        //$response = $this->call('blog:create', ['test:abc', $response]);
                        //$response = $this->call('blog:create');
                        //$response = $this->call('blog:create', ['request' => $request, 'response' => $response]);

                        //var_dump(__FILE__, $this->plugin('blog:create')->blog());
                        //var_dump(__FILE__, $this->call('blog:valid', ['response' => $response, 'request' => $request]));

                        return $response;
                    },*/
                    //'controller' => '@blog:create', //call event (trigger)
                    /*'controller' => function(Response $response, Request $request, ViewManager $vm, array $args = []) {

                        $m = new Home\Model;
                        $m->setTemplate($vm->param('templates.home'));
                        $m->setViewManager($vm);

                        $m->args = $args;

                        return $m;
                    },*/
                    'controller' => 'Home',
                    //'controller' => '@blog:valid',
                    //'controller' => '@test', //test() above
                    //'controller' => '@phpcredits',
                    //'controller' => '@Home',
                    //'controller' => '@Home.test',
                    /*'controller' => new Call(
                        new Service('Home\Factory', [new ServiceManagerLink]),
                        ['config' => new Dependency('Config'), 'vm' => new Dependency('View\Manager')]
                    ),*/
                    //'controller' => '@Home\Controller::staticTest',
                    //'controller' => ['Home\Controller', 'staticTest'],
                    //'controller' => [new Dependency('Home'), 'test'],
                    //'controller' => 'Home\Controller::staticTest', //error
                    //'controller' => new Home\Controller, //works but no view model
                    //'controller' => new Factory(Home\Factory::class),
                    //'controller' => new Service('Home'),
                    //'controller' => new Invoke([new Service('Home'), 'test'], ['request' => new Dependency('Request')]),
                    /*'controller' => new ServiceConfig([
                        'name' => Home\Controller::class,
                        'args' => [new ServiceManagerLink],
                        'calls' => [
                            'setViewModel' => new Hydrator(
                                Home\Model::class,
                                [
                                    'setTemplate'    => new Param('templates.home'),
                                    'setViewManager' => new Dependency('View\Manager'),
                                    [['Home\Controller', 'staticCall'], ['staticA', 'staticB']],
                                    ['Home\Controller', 'staticCall'],
                                    new Filter(new Call('request.getHost'), 'var_dump')
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

                new Router(new Param('routes.definitions.home')),

                new Router(new Param('routes.definitions.application')),

                new Router(new Param('routes.definitions.error'))
            ]
        ]
    ])
];
