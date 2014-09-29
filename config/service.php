<?php
/**
 *
 */

use Framework\Service\Config\Args\Args;
use Framework\Service\Config\Config;
use Framework\Service\Config\Factory\Factory;
use Framework\Service\Config\Filter\Filter;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Service\Service;

return [
    'Controller\Error' => new Hydrator(
        Framework\Controller\Error\Controller::class,
        [
            'setResponse'  => '#Response',
            'setViewModel' => new Hydrator(
                Framework\Controller\Error\ViewModel::class,
                [
                    'setTemplate'    => '%view.templates.error/404',
                    'setViewManager' => '#View\Manager'
                ]
            )
        ]
    ),
    'Controller\Exception\Event'    => Framework\Controller\Exception\Event::class,
    'Controller\Exception\Listener' => new Hydrator(
        Framework\Controller\Exception\Listener::class,
        ['setViewModel' => '#View\Exception\ViewModel']
    ),
    'Controller\Manager' => new Hydrator(
        Framework\Controller\Manager\Manager::class,
        [
            'configuration' => '*Config',
            'events'        => '%events',
            'services'      => '%services'
        ]
    ),
    'Dispatch\Event'    => Framework\Controller\Dispatch\Event::class,
    'Dispatch\Listener' => new Hydrator(
        Framework\Controller\Dispatch\Listener::class,
        [
            'setControllerManager' => '#Controller\Manager'
        ]
    ),
    'Factory' => new Config([
        'args' => ['*ServiceManager']
    ]),
    'Home' => new Hydrator(
        Home\Controller::class,
        [
            'setViewModel' => new Hydrator(
                Home\ViewModel::class,
                [
                    'setTemplate'    => '%view.templates.home',
                    'setViewManager' => '#View\Manager'
                ]
            )
        ]
    ),
    //'Home' => new Factory(Home\Factory::class),
    'Layout' => new Hydrator(
        Framework\View\Layout\ViewModel::class,
        [
            'setTemplate'    => '%view.templates.layout',
            'setViewManager' => '#View\Manager'
        ]
    ),
    'Mvc\Dispatch' => new Hydrator(
        Framework\Mvc\Dispatch\Listener::class,
        ['setControllerManager' => '#Controller\Manager']
    ),
    //alternatively create an anonymous on the fly
    /*'Mvc\Dispatch' => new Invoke(
        //[
            //'#Controller\Manager', 'dispatch'
        //],
        'Controller\Manager.dispatch',
        [
            '#Route',
            new Args([
                'Request'  => '#Request',
                'Response' => '#Response'
            ])
       ]
    ),*/
    'Mvc\Event' => new Service(Framework\Mvc\Event::class, ['*ServiceManager']),
    'Mvc\Layout' => new Hydrator(
        Framework\Mvc\Layout\Listener::class,
        ['setViewModel' => '#Layout']
    ),
    'Mvc\Render' => new Hydrator(
        Framework\Mvc\Render\Listener::class,
        ['setViewManager' => '#View\Manager']
    ),
    'Mvc\Response' => new Hydrator(
        Framework\Mvc\Response\Listener::class,
        ['setResponseManager' => '#Response\Manager']
    ),
    'Mvc\Route' => new Config([
        'name' => Framework\Mvc\Route\Listener::class,
        'args' => [
            new Service(
                'Route',
                [
                    new Args([
                        'hostname' => '@Request.getHost',
                        'method'   => '@Request.getMethod',
                        'path'     => new Filter('@Request.getPathInfo', 'urldecode'),
                        'scheme'   => '@Request.getScheme'
                    ])
                ]
            )
        ],
        'calls' => [
            'setRouteManager' => '#Route\Manager'
        ],
    ]),
    'Request'  => new Service(Request\Request::class, [$_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER]),
    'Response' => Response\Response::class,
    'Response\Event' => new Hydrator(
        Framework\Response\Event::class,
        ['setResponse' => '#Response']
    ),
    'Response\Listener' => Framework\Response\Listener::class,
    'Response\Manager'  => new Hydrator(
        Framework\Response\Manager\Manager::class,
        [
            'configuration' => '*Config',
            'events'        => '%events',
            'services'      => '%services'
        ]
    ),
    'Route' => new Service(
        Framework\Route\Route\Route::class,
        [
            new Args([
                'controller' => '%routes.definitions.error.controller',
                'hostname'   => '@Request.getHost',
                'method'     => '@Request.getMethod',
                'name'       => '%routes.definitions.error.name',
                'path'       => '@Request.getPathInfo',
                'scheme'     => '@Request.getScheme'
            ])
        ]
    ),
    'Route\Dispatch' => new Hydrator(
        Framework\Route\Dispatch\Dispatch::class,
        ['setRouteManager' => '#Route\Manager']
    ),
    'Route\Dispatch\Event'  => Framework\Route\Dispatch\Event::class,
    'Route\Dispatch\Filter' => Framework\Route\Dispatch\Filter::class,
    'Route\Generator' => new Service(
        Framework\Route\Generator\Generator::class,
        ['%routes.definitions']
    ),
    'Route\Generator\Plugin' => new Hydrator(
        Framework\Route\Generator\Plugin::class,
        [
            'setRoute'          => '#Route',
            'setRouteGenerator' => '#Route\Generator'
        ]
    ),
    'Route\Manager' => new Hydrator(
        Framework\Route\Manager\Manager::class,
        [
            'configuration' => '*Config',
            'events'        => '%routes.events',
            'services'      => '%services'
        ]
    ),
    'Route\Match\Event'       => Framework\Route\Match\Event::class,
    'Route\Match\Hostname'    => Framework\Route\Match\Hostname\Hostname::class,
    'Route\Match\Method'      => Framework\Route\Match\Method\Method::class,
    'Route\Match\Path'        => Framework\Route\Match\Path\Path::class,
    'Route\Match\Scheme'      => Framework\Route\Match\Scheme\Scheme::class,
    'Route\Match\Wildcard'    => Framework\Route\Match\Wildcard\Wildcard::class,
    'View\Exception\Event'    => Framework\View\Exception\Event::class,
    'View\Exception\Listener' => new Hydrator(
        Framework\View\Exception\Listener::class,
        [
            'setViewManager' => '#View\Manager',
            'setViewModel'   => '#View\Exception\ViewModel'
        ]
    ),
    'View\Exception\ViewModel' => new Hydrator(
        Framework\View\Exception\ViewModel::class,
        ['setTemplate' => '%view.templates.error/exception']
    ),
    'View\Manager' => new Hydrator(
        Framework\View\Manager\Manager::class,
        [
            'aliases'       => '%view.aliases',
            'events'        => '%events',
            'configuration' => '*Config',
            'services'      => '%services'
        ]
    ),
    'View\Model'        => Framework\View\Model\Model::class,
    'View\Render'       => Framework\View\Render\Render::class,
    'View\Render\Event' => Framework\View\Render\Event::class
];
