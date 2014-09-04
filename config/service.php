<?php
/**
 *
 */

use Framework\Service\Config\Args\Args;
use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Config;
use Framework\Service\Config\ConfigLink\ConfigLink;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;
use Framework\Service\Config\ServiceManagerLink\ServiceManagerLink;

return [
    'Controller\Error' => Framework\Controller\Error\Event::class,
    'Controller\Error\Listener' => new Hydrator(
        Framework\Controller\Error\Listener::class,
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
    'Controller\Exception' => Framework\Controller\Exception\Event::class,
    'Controller\Exception\Listener' => new Hydrator(
        Framework\Controller\Exception\Listener::class,
        ['setViewModel' => new Dependency('View\Exception\ViewModel')]
    ),
    'Controller\Manager' => new Hydrator(
        Framework\Controller\Manager\Manager::class,
        [
            'configuration' => new ConfigLink,
            'events'        => new Param('controllers'),
            'services'      => new Param('services')
        ]
    ),
    'Home' => Framework\Controller\Controller\Event::class,
    'Home\Controller' => new Hydrator(
        Application\Home\Controller::class,
        [
            'setViewModel' => new Hydrator(
                Application\Home\ViewModel::class,
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
    /*'Mvc\Dispatch' => new Hydrator(
        Framework\Mvc\Dispatch\Listener::class,
        ['setControllerManager' => new Dependency('Controller\Manager')]
    ),*/
    //alternatively create an anonymous on the fly
    'Mvc\Dispatch' => new Invoke(
        [
            new Dependency('Controller\Manager'), 'dispatch'
        ],
        [
            new Dependency('Route'), [new Dependency('Request'), new Dependency('Response')]
       ]
    ),
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
                        'hostname' => new Call('Request.getUri.getHost'),
                        'method'   => new Call('Request.getMethod'),
                        'params'   => new Call('Request.getQuery.toArray'),
                        'path'     => new Call('Request.getUri.getPath'),
                        'scheme'   => new Call('Request.getUri.getScheme')
                    ])
                ]
            )
        ],
        'calls' => [
            'setRouteManager' => new Dependency('Route\Manager')
        ],
    ]),
    'Mvc\SendResponse' => new Hydrator(
        Framework\Mvc\SendResponse\Listener::class,
        ['setResponseManager' => new Dependency('Response\Manager')]
    ),
    'Request' => new Service(Application\Request\Request::class, [$_ENV, $_GET, $_POST, $_COOKIE, $_FILES, $_SERVER]),
    'Response'            => Application\Response\Response::class,
    'Response\Event'      => Framework\Response\Response\Event::class,
    'Response\Send\Event' => Framework\Response\Send\Event::class,
    'Response\Send\Http'  => Framework\Response\Send\Http\Listener::class,
    'Response\Manager' => new Hydrator(
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
                'hostname'   => new Call('Request.getUri.getHost'),
                'method'     => new Call('Request.getMethod'),
                'name'       => new Param('routes.definitions.error.name'),
                'params'     => new Call('Request.getQuery.toArray'),
                'path'       => new Call('Request.getUri.getPath'),
                'scheme'     => new Call('Request.getUri.getScheme')
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
    'Translator' => new Hydrator(
        Zend\I18n\Translator\Translator::class,
        [
            //'addTranslationFilePattern' => []
            //'setFallbackLocale' => null,
            'setLocale' => new Param('translator.locale'),
        ]
    ),
    'Translator\Plugin' => new Hydrator(
        Zend\I18n\View\Helper\Translate::class,
        ['setTranslator' => new Dependency('Translator')]
    ),
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
