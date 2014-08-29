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
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;
use Framework\Service\Config\ServiceManagerLink\ServiceManagerLink;

return [
    'Controller\Error' => 'Framework\Controller\Error\Event',
    'Controller\Error\Listener' => new Hydrator(
        'Framework\Controller\Error\Listener',
        [
            'setViewModel' => new Hydrator(
                'Framework\Controller\Error\ViewModel',
                [
                    'setTemplate'    => new Param('view.templates.error/404'),
                    'setViewManager' => new Dependency('View\Manager')
                ]
            )
        ]
    ),
    'Controller\Exception' => 'Framework\Controller\Exception\Event',
    'Controller\Exception\Listener' => new Hydrator(
        'Framework\Controller\Exception\Listener',
        ['setViewModel' => new Dependency('View\Exception\ViewModel')]
    ),
    'Controller\Manager' => new Hydrator(
        'Framework\Controller\Manager\Manager',
        [
            'configuration' => new ConfigLink,
            'events'        => new Param('controllers'),
            'services'      => new Param('services')
        ]
    ),
    'Home' => 'Framework\Controller\Controller\Event',
    'Home\Controller' => new Hydrator(
        'Application\Home\Controller',
        [
            'setViewModel' => new Hydrator(
                'Application\Home\ViewModel',
                [
                    'setTemplate'    => new Param('view.templates.home'),
                    'setViewManager' => new Dependency('View\Manager')
                ]
            )
        ]
    ),
    'Layout' => new Hydrator(
        'Framework\View\Layout\ViewModel',
        [
            'setTemplate'    => new Param('view.templates.layout'),
            'setViewManager' => new Dependency('View\Manager')
        ]
    ),
    'Mvc\Dispatch' => new Hydrator(
        'Framework\Mvc\Dispatch\Listener',
        ['setControllerManager' => new Dependency('Controller\Manager')]
    ),
    'Mvc\Event' => new Service('Framework\Mvc\Event', [new ServiceManagerLink]),
    'Mvc\Layout' => new Hydrator(
        'Framework\Mvc\Layout\Listener',
        ['setViewModel' => new Dependency('Layout')]
    ),
    'Mvc\Render' => new Hydrator(
        'Framework\Mvc\Render\Listener',
        ['setViewManager' => new Dependency('View\Manager')]
    ),
    'Mvc\Response' => new Hydrator(
        'Framework\Mvc\Response\Listener',
        ['setResponseManager' => new Dependency('Response\Manager')]
    ),
    'Mvc\Route' => new Config([
        'name' => 'Framework\Mvc\Route\Listener',
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
        'Framework\Mvc\SendResponse\Listener',
        ['setResponseManager' => new Dependency('Response\Manager')]
    ),
    'Request' => new Service('Application\Request\Request', [$_ENV, $_GET, $_POST, $_COOKIE, $_FILES, $_SERVER]),
    'Response'            => 'Application\Response\Response',
    'Response\Event'      => 'Framework\Response\Response\Event',
    'Response\Send\Event' => 'Framework\Response\Send\Event',
    'Response\Send\Http'  => 'Framework\Response\Send\Http\Listener',
    'Response\Send\Php'   => 'Framework\Response\Send\Php\Listener',
    'Response\Manager' => new Hydrator(
        'Framework\Response\Manager\Manager',
        [
            'configuration' => new ConfigLink,
            'events'        => new Param('events'),
            'services'      => new Param('services')
        ]
    ),
    'Route' => new Service(
        'Framework\Route\Route\Route',
        [
            new Args([
                'controller' => 'Controller\Error',
                'hostname'   => new Call('Request.getUri.getHost'),
                'method'     => new Call('Request.getMethod'),
                'name'       => 'error',
                'params'     => new Call('Request.getQuery.toArray'),
                'path'       => new Call('Request.getUri.getPath'),
                'scheme'     => new Call('Request.getUri.getScheme')
            ])
        ]
    ),
    'Route\Dispatch' => new Hydrator(
        'Framework\Route\Dispatch\Dispatch',
        ['setRouteManager' => new Dependency('Route\Manager')]
    ),
    'Route\Dispatch\Event'  => 'Framework\Route\Dispatch\Event',
    'Route\Dispatch\Filter' => 'Framework\Route\Dispatch\Filter',
    'Route\Generator'       => new Service('Framework\Route\Generator\Generator', [new Param('routes.definitions')]),
    'Route\Generator\Plugin' => new Hydrator(
        'Framework\Route\Generator\Plugin',
        [
            'setRoute'          => new Dependency('Route'),
            'setRouteGenerator' => new Dependency('Route\Generator')
        ]
    ),
    'Route\Manager' => new Hydrator(
        'Framework\Route\Manager\Manager',
        [
            'configuration' => new ConfigLink,
            'events'        => new Param('routes.events'),
            'services'      => new Param('services')
        ]
    ),
    'Route\Match\Event'    => 'Framework\Route\Match\Event',
    'Route\Match\Hostname' => 'Framework\Route\Match\Hostname\Hostname',
    'Route\Match\Method'   => 'Framework\Route\Match\Method\Method',
    'Route\Match\Path'     => 'Framework\Route\Match\Path\Path',
    'Route\Match\Scheme'   => 'Framework\Route\Match\Scheme\Scheme',
    'Route\Match\Wildcard' => 'Framework\Route\Match\Wildcard\Wildcard',
    'Translator' => new Hydrator(
        'Zend\I18n\Translator\Translator',
        [
            //'addTranslationFilePattern' => []
            //'setFallbackLocale' => null,
            'setLocale' => new Param('translator.locale'),
        ]
    ),
    'Translator\Plugin' => new Hydrator(
        'Zend\I18n\View\Helper\Translate',
        ['setTranslator' => new Dependency('Translator')]
    ),
    'View\Exception\Event'    => 'Framework\View\Exception\Event',
    'View\Exception\Listener' => new Hydrator(
        'Framework\View\Exception\Listener',
        [
            'setViewManager' => new Dependency('View\Manager'),
            'setViewModel'   => new Dependency('View\Exception\ViewModel')
        ]
    ),
    'View\Exception\ViewModel' => new Hydrator(
        'Framework\View\Exception\ViewModel',
        ['setTemplate' => new Param('view.templates.error/exception')]
    ),
    'View\Manager' => new Hydrator(
        'Framework\View\Manager\Manager',
        [
            'aliases'       => new Param('view.aliases'),
            'events'        => new Param('events'),
            'configuration' => new ConfigLink,
            'services'      => new Param('services')
        ]
    ),
    'View\Model'            => 'Framework\View\Model\Model',
    'View\Plugin\ViewModel' => new Hydrator('Zend\View\Helper\ViewModel', ['setRoot' => new Dependency('Layout')]),
    'View\Render'           => 'Framework\View\Render\Render',
    'View\Render\Event'     => 'Framework\View\Render\Event'
];
