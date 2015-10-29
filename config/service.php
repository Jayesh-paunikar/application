<?php
/**
 *
 */

use Mvc5\Application\App;
use Mvc5\Config\Config;
use Mvc5\Service\Config\Factory\Factory;
use Mvc5\Service\Config\Hydrator\Hydrator;
use Mvc5\Service\Config\ServiceManagerLink\ServiceManagerLink;
use Mvc5\Service\Config\Service\Service;
use Mvc5\Service\Config\ServiceProvider\ServiceProvider;
use Mvc5\Service\Config\Param\Param;
use Mvc5\View\Manager\Manager as ViewManager;
use Mvc5\View\Model\Model;
use Mvc5\View\Model\ViewModel;
use Service\Config\Manager\Manager as ServiceManager;
use Service\Resolver\Manager\Resolver as ManagerResolver;

return [
    //'Blog' => Blog\Controller::class,
    //'Blog' => new Service(Blog\Controller::class, ['template' => new Param('templates.blog')]),
    'Blog2' => new Config([
        'Create' => new Service(Blog\Create\Create::class),
    ]),
    'Blog' => new App([
        'alias'  => [],
        'events' => [],
        'services' => [
            'Controller' => new Service(Blog\Controller::class, ['template' => new Param('templates.blog')]),
            'Service\Container' => []
        ],
        'templates' => [
            'blog' => __DIR__ . '/../view/blog/index.phtml',
        ]
    ]),

    /*'Home\Controller' => new Service(
        Home\Controller::class,
        [new Service(Home\Model::class, ['home'])],
        ['setModel' => new Service('Home\Model', ['home'])]
    ),*/

    //'Home\Model' => new Service(Home\Model::class, ['home']),

    //'Home\Controller' => new Factory(Home\Factory::class),

    'Request' => new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),

    'Response' => Response\HttpResponse::class,
    'Response\Response' => 'Response',

    'Service\Resolver\Manager' => new ServiceProvider(ManagerResolver::class),

    ViewModel::class => Model::class,

    //'View\Manager' => new ServiceManager(ViewManager::class)

] + include __DIR__ . '/../vendor/mvc5/framework/config/service.php';
