<?php
/**
 *
 */

use Framework\Service\Config\Args\Args;
use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Config;
use Framework\Service\Config\ConfigLink\ConfigLink;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Filter\Filter;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;
use Framework\Service\Config\ServiceManagerLink\ServiceManagerLink;

return [
    'Controller\Error' => new Hydrator(
        Framework\Controller\Error\Controller::class,
        [
            'setResponse'  => new Dependency('Response'),
            'setViewModel' => new Hydrator(
                Framework\Controller\Error\ViewModel::class,
                [
                    'setTemplate'    => new Param('view.templates.error/404'),
                    'setViewManager' => new Dependency('View\Manager')
                ]
            )
        ]
    ),
    'Controller\Exception' => Framework\Controller\Exception\Event::class,
    'Controller\Exception\Listener' => new Hydrator(
        Framework\Controller\Exception\Listener::class,
        ['setViewModel' => new Dependency('View\Exception\ViewModel')]
    ),
    'Dispatch\Event'    => new Service(Framework\Controller\Dispatch\Event::class),
    'Dispatch\Listener' => new Hydrator(
        Framework\Controller\Dispatch\Listener::class,
        [
            'setControllerManager' => new Dependency('Controller\Manager')
        ]
    ),
    'Controller\Manager' => new Hydrator(
        Framework\Controller\Manager\Manager::class,
        [
            'configuration' => new ConfigLink,
            'events'        => new Param('events'),
            'services'      => new Param('services')
        ]
    ),
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
    'Layout' => new Hydrator(
        Framework\View\Layout\ViewModel::class,
        [
            'setTemplate'    => new Param('view.templates.layout'),
            'setViewManager' => new Dependency('View\Manager')
        ]
    ),
    'Mvc\Dispatch' => new Hydrator(
        Framework\Mvc\Dispatch\Listener::class,
        ['setControllerManager' => new Dependency('Controller\Manager')]
    ),
    //alternatively create an anonymous on the fly
    /*'Mvc\Dispatch' => new Invoke(
        //[
            //new Dependency('Controller\Manager'), 'dispatch'
        //],
        'Controller\Manager.dispatch',
        [
            new Dependency('Route'), new Args([new Dependency('Request'), new Dependency('Response')])
       ]
    ),*/
    'Mvc\Event' => new Service(Framework\Mvc\Event::class, [new ServiceManagerLink]),
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
                        'hostname' => new Call('Request.getHost'),
                        'method'   => new Call('Request.getMethod'),
                        'path'     => new Filter(new Call('Request.getPathInfo'), 'urldecode'),
                        'scheme'   => new Call('Request.getScheme')
                    ])
                ]
            )
        ],
        'calls' => [
            'setRouteManager' => new Dependency('Route\Manager')
        ],
    ]),
    'Request'  => new Service(Request\Request::class, [$_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER]),
    'Response' => Response\Response::class,
    'Response\Event' => new Hydrator(
        Framework\Response\Event::class,
        ['setResponse' => new Dependency('Response')]
    ),
    'Response\Listener' => Framework\Response\Listener::class,
    'Response\Manager'  => new Hydrator(
        Framework\Response\Manager\Manager::class,
        [
            'configuration' => new ConfigLink,
            'events'        => new Param('events'),
            'services'      => new Param('services')
        ]
    ),
    'Route' => new Service(
        Framework\Route\Route\Route::class,
        [
            new Args([
                'controller' => new Param('routes.definitions.error.controller'),
                'hostname'   => new Call('Request.getHost'),
                'method'     => new Call('Request.getMethod'),
                'name'       => new Param('routes.definitions.error.name'),
                'path'       => new Call('Request.getPathInfo'),
                'scheme'     => new Call('Request.getScheme')
            ])
        ]
    ),
    'Route\Dispatch' => new Hydrator(
        Framework\Route\Dispatch\Dispatch::class,
        ['setRouteManager' => new Dependency('Route\Manager')]
    ),
    'Route\Dispatch\Event'   => Framework\Route\Dispatch\Event::class,
    'Route\Dispatch\Filter'  => Framework\Route\Dispatch\Filter::class,
    'Route\Generator'        => new Service(Framework\Route\Generator\Generator::class, [new Param('routes.definitions')]),
    'Route\Generator\Plugin' => new Hydrator(
        Framework\Route\Generator\Plugin::class,
        [
            'setRoute'          => new Dependency('Route'),
            'setRouteGenerator' => new Dependency('Route\Generator')
        ]
    ),
    'Route\Manager' => new Hydrator(
        Framework\Route\Manager\Manager::class,
        [
            'configuration' => new ConfigLink,
            'events'        => new Param('routes.events'),
            'services'      => new Param('services')
        ]
    ),
    'Route\Match\Event'    => Framework\Route\Match\Event::class,
    'Route\Match\Hostname' => Framework\Route\Match\Hostname\Hostname::class,
    'Route\Match\Method'   => Framework\Route\Match\Method\Method::class,
    'Route\Match\Path'     => Framework\Route\Match\Path\Path::class,
    'Route\Match\Scheme'   => Framework\Route\Match\Scheme\Scheme::class,
    'Route\Match\Wildcard' => Framework\Route\Match\Wildcard\Wildcard::class,
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
    'View\Manager' => new Hydrator(
        Framework\View\Manager\Manager::class,
        [
            'aliases'       => new Param('view.aliases'),
            'events'        => new Param('events'),
            'configuration' => new ConfigLink,
            'services'      => new Param('services')
        ]
    ),
    'View\Model'        => Framework\View\Model\Model::class,
    'View\Render'       => Framework\View\Render\Render::class,
    'View\Render\Event' => Framework\View\Render\Event::class
];
