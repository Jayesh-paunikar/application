<?php
/**
 *
 */

use Mvc5\Arg;
use Mvc5\Config;
use Mvc5\Container;
use Mvc5\Model;
use Mvc5\Model\ViewModel;
use Mvc5\Plugin\App;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Config as ConfigLink;
use Mvc5\Plugin\Copy;
use Mvc5\Plugin\Dependency;
use Mvc5\Plugin\Factory;
use Mvc5\Plugin\FileInclude;
use Mvc5\Plugin\Hydrator;
use Mvc5\Plugin\Invoke;
use Mvc5\Plugin\Invokable;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Manager;
use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Service;
use Mvc5\Plugin\Param;
use Mvc5\Plugin\Plug;
use Mvc5\Plugin\Plugins;
use Mvc5\Plugin\Provider as Scope;
use Mvc5\Plugin\Value;
use Plugin\Controller;
use Plugin\Route;
use Service\Provider;
use Plugin\Mvc;
use Plugin\PsrRequest;
use Plugin\PsrRoute;

return [
    //'blog:create' => new Plugin('Blog\Create\Create'),
    //'blog:create' => new Plugin('blog2->create'),

    //'blog' => blog\controller::class,
    //'blog' => new Service(blog\controller::class, ['template' => new Param('templates.blog')]),
    'blog2' => new Container([
        'add' => ['event\model', 'event' => 'blog:add'],
        'home'   => 'blog3->home2',
    ]),
    'blog3' => new Config([
        'home2' => new Plugin('Home\Controller')
    ]),

    /**
     * - Class name
     * - Configuration
     * - [optional] Fallback provider for plugins not in the blog App, e.g named arguments.
     * - [optional] Enables blog App as the scope ($this) for anonymous factory methods within the blog App
     */
    'blog' => new App(new FileInclude(__DIR__ . '/blog.php')),

    /*'home\controller' => new Plugin(
        Home\Controller::class
        //,[new service(Home\Model::class, ['home'])],
        //['setModel' => new Plugin('home\model', ['home3'])]
    ),*/

    //'home\model' => new Plugin(Home\Model::class, ['home']),

    //'Home\Controller' => new Factory(Home\Factory::class),

    //'Home\Controller' => new Controller(Home\Controller::class), //custom plugin
    //'Home\Controller' => new Copy(new Controller(Home\Controller::class)),
    //'home\controller' => new Plugin(Home\Controller::class),

    //'Home\Controller' => Home\Controller::class,
    //'Home\Controller' => new Plugin('blog->home'),

    'message' => new Value('Demo web application.'), //string value
    'Home\Controller' => function($message, Request\Request $request) {
        $model = $this->plugin(Home\Model::class, ['home', ['message' => $message]]);
        return new Home\Controller($model);
    },

    'request' => new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),

    'response' => Response\HttpResponse::class,
    //'http\response' => new Plugin(Response\HttpResponse::class),
    //'response'      => new Plug('http\response'),

    'Response\Response' => 'response',

    'route' => new Route,

    /**
     * A demo scoped plugin provider for $_SERVER. Uses a config object to return values from the plugin container.
     * The Scope Provider plugin sets the config object as the scope for the anonymous functions in the plugin container.
     */
    'server'        => new Dependency('server\config'),
    'server\config' => new Scope(Server\Config::class, new App(new FileInclude(__DIR__.'/server.php'))),

    /**
     * PSR-7
     *
     * For "compliance" use Response\Psr\Compliant\Response, Mvc\Event\Model and Mvc\Response.
     *
     * For "compatibility" use Response\Psr\Compatible\Response, Mvc\Event\ResponseModel.
     *
     * Read the event config for further information on error and exception handling.
     */
    /*
    'request'      => new PsrRequest,
    'route'        => new PsrRoute,

    //compliance
    'mvc'          => new Mvc,
    'mvc\response' => \Mvc\Response::class,
    'response'     => Response\Psr\Compliant\Response::class,

    //compatibility
    //'response'     => Response\Psr\Compatible\Response::class,
    //'mvc'          => new Mvc(\Mvc\Event\ResponseModel::class),
    */

    /**
     * The PSR-7 Middleware demo requires the *\Middleware controllers to be uncommented in the route config and
     * the 'web' event config must be changed to use 'middleware' instead of 'mvc'.
     */
    /*
    'middleware\controller' => new Service(Middleware\Controller::class),
    'middleware\layout'     => [Middleware\Layout::class, new Plugin('layout')],
    'middleware\renderer'   => new Service(Middleware\Renderer::class),
    'middleware\router'     => [Middleware\Router::class, new Invoke('route\dispatch')],
    'response\send'         => Response\Psr\Send::class,
    */

    ViewModel::class => Model::class,

    'service\provider' => new Manager(Provider::class),

    //test false but not null container value

    /*'user\authenticated' => function() {
        var_dump(__FILE__);
        return false;
    },*/

    //'user\authenticated' => false,

    //'authenticated' => new Invokable(new Dependency('user\authenticated'))

] + include __DIR__ . '/../vendor/mvc5/framework/config/service.php';
