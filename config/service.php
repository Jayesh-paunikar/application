<?php
/**
 *
 */

use Framework\Service\Config\Args\Args;
use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Config;
use Framework\Service\Config\ConfigLink\ConfigLink;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Factory\Factory;
use Framework\Service\Config\Filter\Filter;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Manager\Manager;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;
use Framework\Service\Config\ServiceManagerLink\ServiceManagerLink;

return [
    'Config'       => new ConfigLink,
    'Controller\Dispatch'   => Framework\Controller\Dispatch\Dispatch::class,
    'Controller\Dispatcher' => new Hydrator(
        Framework\Controller\Dispatch\Dispatcher::class,
        [
            'setControllerManager' => new Dependency('Controller\Manager')
        ]
    ),
    'Controller\Error' => new Hydrator(
        Framework\Controller\Error\Controller::class,
        [
            'setViewModel' => new Hydrator(
                Framework\Controller\Error\ViewModel::class,
                [
                    'setTemplate'    => new Param('view.templates.error/404'),
                    'setViewManager' => new Dependency('View\Manager')
                ]
            )
        ]
    ),
    'Controller\Manager'   => new Manager(Framework\Controller\Manager\Manager::class),
    'Controller\Exception' => Framework\Controller\Exception\Dispatch::class,
    'Controller\Exception\Controller' => new Hydrator(
        Framework\Controller\Exception\Controller::class,
        ['setViewModel' => new Dependency('Exception\ViewModel')]
    ),
    'Exception\Renderer' => new Hydrator(
        Framework\View\Exception\Renderer::class,
        [
            'setViewManager' => new Dependency('View\Manager'),
        ]
    ),
    'Exception\View'    => new Hydrator(
        Framework\View\Exception\View::class,
        [
            'setViewModel' => new Dependency('Exception\ViewModel')
        ]
    ),
    'Exception\ViewModel' => new Hydrator(
        Framework\View\Exception\ViewModel::class,
        ['setTemplate' => new Param('view.templates.error/exception')]
    ),
    'Factory' => new Config([
        'args' => [new ServiceManagerLink]
    ]),
    'Form' => new Config([
        'calls' => [
            'setViewManager' => new Dependency('View\Manager'),
        ]
    ]),
    'Home' => new Hydrator(
        Home\Controller::class,
        [
            'setViewModel' => new Hydrator(
                Home\ViewModel::class,
                [
                    'setTemplate'    => new Param('view.templates.home'),
                    'setViewManager' => new Dependency('View\Manager')
                ]
            )
        ]
    ),
    //'Home' => new Factory(Home\Factory::class),
    'Layout' => new Hydrator(
        Framework\View\Layout\ViewModel::class,
        [
            'setTemplate'    => new Param('view.templates.layout'),
            'setViewManager' => new Dependency('View\Manager')
        ]
    ),
    'Manager' => new Config([
        'calls' => [
            'aliases'       => new Param('alias'),
            'configuration' => new ConfigLink,
            'events'        => new Param('events'),
            'services'      => new Param('services'),
        ]
    ]),
    'Mvc\Event'      => new Service(Framework\Mvc\MvcEvent::class, [new ServiceManagerLink]),
    'Mvc\Controller' => new Hydrator(
        Framework\Mvc\Controller\Dispatcher::class,
        ['setControllerManager' => new Dependency('Controller\Manager')]
    ),
    //alternatively create an anonymous on the fly
    /*'Mvc\Controller' => new Invoke(
        [
            new Dependency('Controller\Manager'), 'dispatch'
        ],
        [
            new Call('Controller\Manager.controller', [new Call('Route.controller')]),
            new Args([
                'request'  => new Dependency('Request'),
                'response' => new Dependency('Response')
            ]),
            new Dependency('Plugin')
       ]
    ),*/
    'Mvc\Layout' => new Hydrator(
        Framework\Mvc\Layout\Renderer::class,
        ['setViewModel' => new Dependency('Layout')]
    ),
    'Mvc\View' => new Hydrator(
        Framework\Mvc\View\Renderer::class,
        ['setViewManager' => new Dependency('View\Manager')]
    ),
    'Mvc\Response' => new Hydrator(
        Framework\Mvc\Response\Dispatcher::class,
        ['setResponseManager' => new Dependency('Response\Manager')]
    ),
    'Mvc\Route' => new Config([
        'name' => Framework\Mvc\Route\Router::class,
        'args' => [
            new Service(
                'Route',
                [
                    new Args([
                        'controller' => new Param('routes.definitions.error.controller'),
                        'hostname'   => new Call('request.getHost'),
                        'method'     => new Call('request.getMethod'),
                        'name'       => new Param('routes.definitions.error.name'),
                        'path'       => new Call('request.getPathInfo'),
                        'scheme'     => new Call('request.getScheme')
                    ])
                ]
            )
        ],
        'calls' => [
            'setRouteManager' => new Dependency('Route\Manager')
        ],
    ]),
    'Plugin'   => new ServiceManagerLink,
    'Request'  => new Service(Request\Request::class, [$_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER]),
    'Response' => Response\Response::class,
    'Response\Dispatch' => Framework\Response\Dispatch::class,
    'Response\Sender'   => Framework\Response\Sender::class,
    'Response\Manager'  => new Manager(Framework\Response\Manager\Manager::class),
    'Route' => new Service(
        Framework\Route\Config::class,
        [
            new Args([
                'hostname' => new Call('request.getHost'),
                'method'   => new Call('request.getMethod'),
                'path'     => new Call('request.getPathInfo'),
                'scheme'   => new Call('request.getScheme')
            ])
        ]
    ),
    'Route\Dispatch'          => Framework\Route\Router\Dispatch::class,
    'Route\Dispatch\Filter'   => Framework\Route\Router\Filter::class,
    'Route\Generator' => new Service(
        Framework\Route\Generator\Generator::class,
        [new Param('routes.definitions')]
    ),
    'Route\Generator\Plugin' => new Hydrator(
        Framework\Route\Generator\Plugin::class,
        [
            'setRoute'          => new Dependency('Route'),
            'setRouteGenerator' => new Dependency('Route\Generator')
        ]
    ),
    'Route\Manager' => new Manager(
        Framework\Route\Manager\Manager::class, [
            'events' => new Param('routes.events')
        ]
    ),
    'Route\Match'             => Framework\Route\Match\Match::class,
    'Route\Match\Hostname'    => Framework\Route\Match\Hostname\Hostname::class,
    'Route\Match\Method'      => Framework\Route\Match\Method\Method::class,
    'Route\Match\Path'        => Framework\Route\Match\Path\Path::class,
    'Route\Match\Scheme'      => Framework\Route\Match\Scheme\Scheme::class,
    'Route\Match\Wildcard'    => Framework\Route\Match\Wildcard\Wildcard::class,
    'Router'                  => new Hydrator(
        Framework\Route\Router\Router::class,
        ['setRouteManager' => new Dependency('Route\Manager')]
    ),
    'Service\Manager'         => new ServiceManagerLink,
    'View\Manager'  => new Manager(Framework\View\Manager\Manager::class),
    'ViewManager'   => new Dependency('View\Manager'),
    'View\Model'    => Framework\View\Model\Model::class,
    'View\Renderer' => Framework\View\Renderer\Renderer::class,
    'View\Render'   => Framework\View\Render\Render::class
];
