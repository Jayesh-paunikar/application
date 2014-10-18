<?php
/**
 *
 */

use Framework\Service\Config\Args\Args;
use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Config;
use Framework\Service\Config\ConfigLink\ConfigLink;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Event\Event;
use Framework\Service\Config\Factory\Factory;
use Framework\Service\Config\Filter\Filter;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Manager\Manager;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;
use Framework\Service\Config\ServiceManagerLink\ServiceManagerLink;

return [
    //demo blog
    'Blog\Service' => new Manager(Blog\Service::class),

    'Config' => new ConfigLink,

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
    'Controller\Exception\Event'    => Framework\Controller\Exception\Event::class,
    'Controller\Exception\Listener' => new Hydrator(
        Framework\Controller\Exception\Listener::class,
        ['setViewModel' => new Dependency('View\Exception\ViewModel')]
    ),
    'Controller\Manager' => new Manager(Framework\Controller\Manager\Manager::class),
    'Dispatch\Event'    => Framework\Controller\Dispatch\Event::class,
    'Dispatch\Listener' => new Hydrator(
        Framework\Controller\Dispatch\Listener::class,
        [
            'setControllerManager' => new Dependency('Controller\Manager')
        ]
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
    'Mvc\Dispatch' => new Hydrator(
        Framework\Mvc\Dispatch\Listener::class,
        ['setControllerManager' => new Dependency('Controller\Manager')]
    ),
    //alternatively create an anonymous on the fly
    /*'Mvc\Dispatch' => new Invoke(
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
    'Mvc\Event' => new Event(new Service(Framework\Mvc\Event::class, [new ServiceManagerLink])),
    'Mvc\Layout' => new Hydrator(
        Framework\Mvc\Layout\Listener::class,
        ['setViewModel' => new Dependency('Layout')]
    ),
    'Mvc\Render' => new Hydrator(
        Framework\Mvc\Render\Listener::class,
        ['setViewManager' => new Dependency('View\Manager')]
    ),
    'Mvc\Response' => new Hydrator(
        Framework\Mvc\Response\Listener::class,
        ['setResponseManager' => new Dependency('Response\Manager')]
    ),
    'Mvc\Route' => new Config([
        'name' => Framework\Mvc\Route\Listener::class,
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
    'Response\Event'    => Framework\Response\Event::class,
    'Response\Listener' => Framework\Response\Listener::class,
    'Response\Manager'  => new Manager(Framework\Response\Manager\Manager::class),
    'Route' => new Service(
        Framework\Route\Route\Route::class,
        [
            new Args([
                'hostname' => new Call('request.getHost'),
                'method'   => new Call('request.getMethod'),
                'path'     => new Call('request.getPathInfo'),
                'scheme'   => new Call('request.getScheme')
            ])
        ]
    ),
    'Route\Dispatch' => new Hydrator(
        Framework\Route\Dispatch\Dispatch::class,
        ['setRouteManager' => new Dependency('Route\Manager')]
    ),
    'Route\Manager' => new Manager(
        Framework\Route\Manager\Manager::class, [
            'events' => new Param('routes.events')
        ]
    ),
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
    'Route\Dispatch\Event'    => Framework\Route\Dispatch\Event::class,
    'Route\Dispatch\Filter'   => Framework\Route\Dispatch\Filter::class,
    'Route\Match\Event'       => Framework\Route\Match\Event::class,
    'Route\Match\Hostname'    => Framework\Route\Match\Hostname\Hostname::class,
    'Route\Match\Method'      => Framework\Route\Match\Method\Method::class,
    'Route\Match\Path'        => Framework\Route\Match\Path\Path::class,
    'Route\Match\Scheme'      => Framework\Route\Match\Scheme\Scheme::class,
    'Route\Match\Wildcard'    => Framework\Route\Match\Wildcard\Wildcard::class,
    'Service\Manager'         => new ServiceManagerLink,
    'View\Exception\Event'    => Framework\View\Exception\Event::class,
    'View\Exception\Listener' => new Hydrator(
        Framework\View\Exception\Listener::class,
        [
            'setViewManager' => new Dependency('View\Manager'),
            'setViewModel'   => new Dependency('View\Exception\ViewModel')
        ]
    ),
    'View\Exception\ViewModel' => new Hydrator(
        Framework\View\Exception\ViewModel::class,
        ['setTemplate' => new Param('view.templates.error/exception')]
    ),
    'View\Manager'      => new Manager(Framework\View\Manager\Manager::class),
    'ViewManager'       => new Dependency('View\Manager'),
    'View\Model'        => Framework\View\Model\Model::class,
    'View\Render'       => Framework\View\Render\Render::class,
    'View\Render\Event' => Framework\View\Render\Event::class
];
