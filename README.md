[![Build Status](https://scrutinizer-ci.com/g/mvc5/framework/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mvc5/framework/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/mvc5/framework/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mvc5/framework/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mvc5/framework/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mvc5/framework/?branch=master)  
[![Build Status](https://api.travis-ci.org/mvc5/application.svg)](https://travis-ci.org/mvc5/framework)
[![Test Coverage](https://codeclimate.com/github/mvc5/framework/badges/coverage.svg)](https://codeclimate.com/github/mvc5/framework)
[![Code Climate](https://codeclimate.com/github/mvc5/framework/badges/gpa.svg)](https://codeclimate.com/github/mvc5/framework)  
[![Total Downloads](https://camo.githubusercontent.com/77accf6ece1334500ae2fdfffe7ecc583edbe624/68747470733a2f2f706f7365722e707567782e6f72672f6d7663352f6672616d65776f726b2f646f776e6c6f616473)](https://packagist.org/packages/mvc5/framework)
[![License](https://camo.githubusercontent.com/b816a4f30fe7b3cb7d70bd0502cc0e057ac1ccf9/68747470733a2f2f706f7365722e707567782e6f72672f6d7663352f6672616d65776f726b2f6c6963656e7365)](https://packagist.org/packages/mvc5/framework)    
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/6a19e4e3-e771-46e3-9f10-fe1c06837f43/big.png)](https://insight.sensiolabs.com/projects/6a19e4e3-e771-46e3-9f10-fe1c06837f43)  
[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/mvc5/framework?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)  

[**http://mvc5.github.io**](http://mvc5.github.io)

Welcome to an enhanced php programming environment that provides inversion of control of a web application or any function.

## Features
* Configuration
* Maintainability
* Controller Dispatch
* Route Matching
* Response
* View
* Exceptions
* Dependency Injection
* Constructor Autowiring
* Plugins
* Configurable events and custom behaviours
* Calling methods using named arguments and plugin support
* Controller Action - a Middleware like event.
* Console Applications

All of the components require [dependency injection](#dependency-injection) and use [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) objects for consistency and ease of use. For example, the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) uses it to manage service objects, and has additional [service container](https://github.com/mvc5/framework/blob/master/src/Service/Container/ServiceContainer.php) methods for the underlying configuration of the services that it provides. The main [service configuration array](https://github.com/mvc5/framework/blob/master/config/service.php) can contain real values, string names, [callable types](http://php.net/manual/en/language.types.callable.php) and [configuration objects](https://github.com/mvc5/framework/tree/master/src/Service/Config) that are [resolvable](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L323) by the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php).

## Maintainability
Being able to makes changes to a project, especially beyond its initial development, is an important aspect of any project.
   
_[View the interactive PhpMetrics report](http://mvc5.github.io/phpmetrics)_

[![](http://mvc5.github.io/phpmetrics/images/maintenability.png)](http://mvc5.github.io/phpmetrics/)[![](http://mvc5.github.io/phpmetrics/images/evaluation.png)](http://mvc5.github.io/phpmetrics/)  [![](http://mvc5.github.io/phpmetrics/images/eval-report.png)](http://mvc5.github.io/phpmetrics/)
[![](http://mvc5.github.io/phpmetrics/images/custom.png)](http://mvc5.github.io/phpmetrics/)[![](http://mvc5.github.io/phpmetrics/images/abstractness.png)](http://mvc5.github.io/phpmetrics/)

## Benchmark
*Current*

```
HTML transferred:       7331150 bytes
Requests per second:    936.49 [#/sec] (mean)
Time per request:       10.678 [ms] (mean)
Time per request:       1.068 [ms] (mean, across all concurrent requests)
```

*Other/Previous*

```
HTML transferred:       5502000 bytes
Requests per second:    315.78 [#/sec] (mean)
Time per request:       31.667 [ms] (mean)
Time per request:       3.167 [ms] (mean, across all concurrent requests)
```

## Source Lines of Code

```
SLOC	Directory	SLOC-by-Language (Sorted)
1144    Service         php=1144
1030    Route           php=1030
381     View            php=381
249     Controller      php=249
213     Mvc             php=213
199     Response        php=199
110     Event           php=110
92      Config          php=92
32      Application     php=32


Totals grouped by language (dominant language first):
php:           3450 (100.00%)
```

_Generated using [David A. Wheeler's <b>SLOCCount</b>](http://www.dwheeler.com/sloccount)._

## Usage
The <a href="https://github.com/mvc5/application">mvc5/application</a> demonstrates its usage as a [web application](#web-application).

```php
include __DIR__ . '/../vendor/autoload.php';
```

```php
use Mvc5\Service\Container\Container;

$config = [
    'alias'     => include __DIR__ . '/alias.php',
    'events'    => include __DIR__ . '/event.php',
    'services'  => new Container(include __DIR__ . '/service.php'),
    'routes'    => include __DIR__ . '/route.php',
    'templates' => include __DIR__ . '/templates.php'
];
```

```php
(new App(include __DIR__ . '/../config/config.php'))->call('web');
```

## Web Application
A default [configuration](https://github.com/mvc5/framework/blob/master/config/config.php) is provided with the minimum [configuration](https://github.com/mvc5/framework/blob/master/config) required to run a web application. Then, all that is required are the [request](https://github.com/mvc5/application/blob/master/config/service.php#L30) and [response](https://github.com/mvc5/application/blob/master/config/service.php#L32) objects, [template](https://github.com/mvc5/application/blob/master/config/templates.php) configuration and the [routes](https://github.com/mvc5/application/blob/master/config/route.php) to use. [Routes](#routes) must have a name, so that they can be used to [build](https://github.com/mvc5/framework/blob/master/src/Route/Generator/Generator.php#L47) urls in the [view templates](https://github.com/mvc5/application/tree/master/view) with the [url plugin](https://github.com/mvc5/framework/blob/master/config/alias.php#L19).

```php
new App(include __DIR__ . '/../vendor/mvc5/framework/config/config.php')->call('web');
```

## Console Application
A simple [console application](https://github.com/mvc5/application/blob/master/src/Console/Example.php) can be created by passing the [command line arguments](http://php.net/manual/en/reserved.variables.argv.php) to the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) [call](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L63) method. E.g

```php
./app.php 'Console\Example' Monday January
```

```php
include './init.php';

(new App('./config/config.php'))->call($argv[1], array_slice($argv, 2));
```

The first argument is the name of the function and the remaining arguments are its parameters. E.g.

```php
namespace Console;

use Mvc5\View\Model\ViewModel;

class Example
{
    protected $model;
    
    public function __construct(ViewModel $model)
    {
        $this->model = $model;
    }
    
    public function __invoke($day, $month)
    {
        var_dump($this->model);
        echo $day . ' ' . $month . "\n";
    }
}
```

Read more about <a href="#dependency-injection">dependency injection</a> and <a href="#constructor-autowiring">constructor autowiring</a> on how the dependencies of a function can be resolved. Note, that it is also possible to create a console application similar to a [web application](#web-application) with [routes](#routes) and controllers.

## Environment Aware Configurations
Development configurations can override production values using [array_merge](http://php.net/manual/en/function.array-merge.php) since each [configuration](https://github.com/mvc5/application/blob/master/config/config.php) file returns an array of values. E.g

```php
return array_merge(
    include __DIR__ . '/../config.php',
    [
        'db_name' => 'dev'
    ]
);
```

In the above example, the development configuration file <mark>config/dev/config.php</mark> includes the main production file <mark>config/config.php</mark> and overrides the name of the database to use in development.

## Configuration and ArrayAccess
A standard [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface is used consistently throughout each component in order to provide a standard set of *concrete* configuration methods. Its [ArrayAccess](http://php.net/manual/en/class.arrayaccess.php) interface enables the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) to [retrieve](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L276) nested configuration values, e.g.

```php
new Param('templates.error');
```

Resolves to

```php
$config['templates']['error'];
```

Which makes it possible to use either an array or a [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object when [references](http://php.net/manual/en/language.references.php) are needed, e.g [templates and aliases](https://github.com/mvc5/framework/blob/master/config/config.php#L13).

```php
interface Configuration
    extends ArrayAccess
{
    function get($name);
    function has($name);
    function remove($name);
    function set($name, $config);
}
```

Implementing the [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface allows components to only have to specify their immutable methods and allows the component to choose whether or not to extend the [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface or to implement it separately. The idea is that most of the time, only the immutable methods are of interest and the [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface provides a consistent way of instantiating it.

```php
interface Route
    extends Configuration
{
    const CONTROLLER = 'controller';
    const PATH = 'path';
    function controller();
    function path();
}
```

Constants can be used by other components to update the [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object via [ArrayAccess](http://php.net/manual/en/class.arrayaccess.php).

```php
$route[Route::PATH] = '/home';
//or
$route->set(Route::PATH, '/home');
```

## Routes
A [route](https://github.com/mvc5/framework/blob/master/src/Route/Route.php) [definiton](https://github.com/mvc5/framework/blob/master/src/Route/Definition/Definition.php) is a [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object that can also be [configured](https://github.com/mvc5/application/blob/master/config/route.php) as an array, and contains the properties required to [match](https://github.com/mvc5/framework/blob/master/config/event.php#L30) a [route](https://github.com/mvc5/framework/blob/master/src/Route/Route.php). Before [matching](https://github.com/mvc5/framework/blob/master/src/Route/Match/Match.php), if the [definiton](https://github.com/mvc5/framework/blob/master/src/Route/Definition/Definition.php) does not have a [regex](https://github.com/mvc5/framework/blob/master/src/Route/Definition/Definition.php#L56), it will be [compiled](https://github.com/mvc5/framework/blob/master/src/Route/Builder/Base.php#L87) against the [route](https://github.com/mvc5/framework/blob/master/src/Route/Route.php)'s request uri [path](https://github.com/mvc5/framework/blob/master/src/Route/Route.php#L51). Each aspect of [matching](https://github.com/mvc5/framework/blob/master/src/Route/Match/Match.php) a [route](https://github.com/mvc5/framework/blob/master/src/Route/Route.php) has a dedicated function, e.g. [scheme](https://github.com/mvc5/framework/blob/master/src/Route/Match/Scheme/Scheme.php), [hostname](https://github.com/mvc5/framework/blob/master/src/Route/Match/Hostname/Hostname.php), [path](https://github.com/mvc5/framework/blob/master/src/Route/Match/Path/Path.php), [method](https://github.com/mvc5/framework/blob/master/src/Route/Match/Method/Method.php), [wildcard](https://github.com/mvc5/framework/blob/master/src/Route/Match/Wildcard/Wildcard.php), and any other function can be [configured](https://github.com/mvc5/application/blob/master/config/route.php) for the [route match event](https://github.com/mvc5/framework/blob/master/src/Route/Match/Match.php).

In order to [build](https://github.com/mvc5/framework/blob/master/src/Route/Generator/Generator.php#L47) a url using the [route plugin](https://github.com/mvc5/framework/blob/master/src/Route/Plugin/Plugin.php), e.g. as a [view helper plugin](https://github.com/mvc5/framework/blob/master/src/View/ViewPlugin.php), the [base route](https://github.com/mvc5/application/blob/master/config/route.php#L7) must have a name, which is typically the homepage for /, e.g [home](https://github.com/mvc5/application/blob/master/config/route.php#L7), or it can specify its own, e.g /application. [Child](https://github.com/mvc5/application/blob/master/config/route.php#L10) routes except for the first level, will automatically have their parent name [prepended](https://github.com/mvc5/framework/blob/master/src/Route/Router/Router.php#L61) to their name, e.g blog/create. First level routes will not have the [base route](https://github.com/mvc5/application/blob/master/config/route.php#L7) prepended as it keeps their name simpler when [specifying](https://github.com/mvc5/application/blob/master/view/blog/create.phtml#L2) which [route definition](https://github.com/mvc5/framework/blob/master/src/Route/Definition/Definition.php) to [build](https://github.com/mvc5/framework/blob/master/src/Route/Generator/Generator.php#L47), e.g. blog instead of home/blog.

The [controller](https://github.com/mvc5/framework/blob/master/src/Route/Definition/Definition.php#L26) param must be a service configuration value (which includes real values) that must [resolve](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L186) to a [callable](http://php.net/manual/en/language.types.callable.php) type. If no [service configuration](https://github.com/mvc5/application/blob/master/config/service.php) for the controller exists but its class does, a new instance will be created with [constructor autowiring](#constructor-autowiring).

Controller configurations that are prefixed with an [@](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Args.php#L18) will be [called](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L63), so they must [resolve](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L186) to a callable type or be the name of an event. In the example below, [@Blog.test](https://github.com/mvc5/application/blob/master/config/route.php#L13) will call the [test](https://github.com/mvc5/application/tree/master/src/Blog/Controller.php) method on a shared instance of the [Blog](https://github.com/mvc5/application/tree/master/src/Blog/Controller.php) controller. [@blog.remove](https://github.com/mvc5/application/blob/master/config/route.php#L15) will call the [blog:remove](https://github.com/mvc5/application/blob/master/config/event.php#L13) event. And [@blog:create](https://github.com/mvc5/application/blob/master/config/alias.php#L9) is an [alias](https://github.com/mvc5/application/blob/master/config/alias.php#L9) to a [blog create](https://github.com/mvc5/application/blob/master/src/Blog/Create.php) event.

Constraints have named keys that match their corresponding [regex](https://github.com/mvc5/framework/blob/master/src/Route/Definition/Definition.php#L56) parameter and optional parameters are enclosed with square brackets `[]`. This implementation is from the [DASPRiD/Dash](https://github.com/DASPRiD/Dash) router project.

```php
return [
    'name'       => 'home', //for the url plugin in view templates
    'route'      => '/',
    'controller' => 'Home\Controller', //callable
    'children' => [
        'blog' => [
            'route'      => 'blog',
            'controller' => '@Blog.test', //specific method
            'children' => [
                'remove' => [
                    'route' => '/remove',
                    'controller' => '@blog:remove'
                ],
                'create' => [
                    'route'      => '/:author[/:category]',
                    'defaults'   => [
                        'author'   => 'owner',
                        'category' => 'web'
                    ],
                    'wildcard'   => false,
                    'controller' => '@blog:create', //call event
                    //'controller'  => function($request) { //named args
                        //var_dump($request->getPathInfo());
                    //},
                    'constraints' => [
                        'author'   => '[a-zA-Z0-9_-]*',
                        'category' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
        ]
    ]
];
```

Route [definition](https://github.com/mvc5/framework/blob/master/src/Route/Definition/Definition.php) names are used by the url [route generator](https://github.com/mvc5/framework/blob/master/src/Route/Generator/Generator.php), e.g

```php
echo $this->url('blog/create', ['author' => 'owner', 'category' => 'oop']);
```

## Model View Controller
Controllers can use a [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object as a [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) object that is [rendered](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) by the view using a specified [template](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php#L23) file name and an optional [child](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php#L18) model which is used by the [layout model](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php). For convenience, controllers can use an existing [view model trait](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php) that has methods for setting the model and returning it. If no model is injected, then a new instance of a standard model will be [created](https://github.com/mvc5/framework/blob/master/src/View/ViewModel.php#L33) and returned. When a controller is [invoked](https://github.com/mvc5/framework/blob/master/src/Controller/Dispatch/Dispatcher.php) and returns a model, it is stored as the [content](https://github.com/mvc5/framework/blob/master/src/Mvc/Base.php#L73) of the [response](https://github.com/mvc5/application/blob/master/config/service.php#L30) object and will be rendered prior to sending the response. The [view model trait](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php) has two methods

* [model](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L28)
* [view](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L44)

This allows the controller to choose the [view](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L44) method when a specific template is known, or the controller can use the [model](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L28) method and pass an array of variables as the data for the [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php).

```php
use Mvc5\View\ViewModel;

class Controller
{
    use ViewModel;
    
    public function __invoke()
    {
        return $this->model(['message' => 'Hello World']);
        // or
        return $this->view('home', ['message' => 'Hello World']);
    }
}
```

## Controller Action
The [controller action](https://github.com/mvc5/framework/blob/master/src/Service/Config/ControllerAction/ControllerAction.php) service configuration is for an [action controller event](https://github.com/mvc5/framework/blob/master/src/Controller/Action/Action.php) which accepts an array of functions that are called with [named argument plugin](#named-arguments-and-plugins) support. If the response from the function is a [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php), it will be <a href="https://github.com/mvc5/framework/blob/master/src/Controller/Action/Action.php#L50">stored</a> and become available to the remaining functions. If the function returns a [response](https://github.com/mvc5/framework/blob/master/src/Response/Response.php), then the event is <a href="https://github.com/mvc5/framework/blob/master/src/Controller/Action/Action.php#L52">stopped</a> and the [response](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) is returned.

```php
'controller' => new ControllerAction([
    function(array $args = []) {
        return new Model(null, ['args' => $args]);
    },
    function(Model $model) {
        $model['__CONTROLLER__'] = __FUNCTION__;
        return $model;
    },
    function(Model $model) {
        $model[$model::TEMPLATE] = 'home';
        return $model;
    },
]),
```

## Rendering View Models
When the content of the [response](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) is a [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php), it is [rendered](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) prior to [sending](https://github.com/mvc5/framework/blob/master/src/Response/Send/Sender.php) the [response](https://github.com/mvc5/framework/blob/master/src/Response/Response.php). Additionally, and [prior](https://github.com/mvc5/framework/blob/master/config/event.php#L19) to [rendering](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) the [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php), if a [layout model](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php) is to be used, it will [add](https://github.com/mvc5/framework/blob/master/src/Mvc/Layout/Renderer.php#L25) the current [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) to itself as its child content and the [layout model](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php) is then set as the content of the [response](https://github.com/mvc5/framework/blob/master/src/Response/Response.php).

```php
function __invoke($model = null, ViewModel $layout = null)
{
    if (!$model || !$layout) {
        return $model;
    }
    
    if (!$model instanceof ViewModel || $model instanceof LayoutModel) {
        return $model;
    }
    
    $layout->child($model);
    
    return $layout;
}
```

The [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) is then [rendered](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php#L32) via the [view render event](https://github.com/mvc5/framework/blob/master/src/View/Render/Render.php) which allows other renderers to be [configured](https://github.com/mvc5/framework/blob/master/config/event.php#L48) and used instead of the default [view renderer](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php).

The [view renderer](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) will [bind](http://php.net/manual/en/closure.bind.php) the [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) to a [closure](http://php.net/manual/en/class.closure.php) that will [extract](http://php.net/manual/en/function.extract.php) the view model variables and then [include](http://php.net/manual/en/function.include.php) the template file. The scope of the template is the [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) itself which gives the template access to any of the view model's [private](http://php.net/manual/en/language.oop5.visibility.php) and [protected](http://php.net/manual/en/language.oop5.visibility.php) [properties](http://php.net/manual/en/language.oop5.properties.php) and functions.

```php

$render = Closure::bind(function() {
    extract((array) $this->assigned());
    
    ob_start();
    
    try {
    
        include $this->path();
        
        return ob_get_clean();
    
    } catch(Exception $exception) {
    
        ob_get_clean();
    
        throw $exception;
    }

},
$model
);

return $render();

```

## View Model Plugins
The default [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) also supports [plugins](https://github.com/mvc5/framework/blob/master/config/alias.php) which require the [view manager](https://github.com/mvc5/framework/blob/master/src/View/Manager/ViewManager.php) to be injected prior to [rendering](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) it. However, because they can be created by a controller, this may not of happened. To overcome this, the current [view manager](https://github.com/mvc5/framework/blob/master/src/View/Manager/ViewManager.php) will be [injected](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php#L47) into the [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) if it does not already have one.

```php
<?php

/** @var Mvc5\View\Model\ViewModel $this */

echo $this->url('home');
```

## Events
Events can be strings or classes that can manage the arguments used by the methods that invoked it.

```php
class Event
{
    function args()
    {
        return [
        Args::EVENT      => $this,
        Args::RESPONSE   => $this->response(),
        Args::ROUTE      => $this->route(),
        Args::VIEW_MODEL => $this->viewModel(),
        Args::CONTROLLER => $this->route()->controller()
        ];
    }
    
    function __invoke(callable $listener, array $args = [], callable $callback = null)
    {
        $response = $this->signal($listener, $this->args() + $args, $callback);
        
        if ($response instanceof Response) {
        $this->stop();
        }
        
        return $response;
    }
}
```

The <a href="http://php.net/manual/en/language.types.callable.php">callable</a> $callback parameter can be used to provide any additional parameters not in the named $args array. It can be a [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php), e.g $this, or any callable type.

```php
$this->trigger([Dispatch::CONTROLLER, $controller], $args, $this);
```

Similar to $args in <a href="#named-arguments-and-plugins">named arguments</a>, adding $event will provide the current event.

The [trigger()](https://github.com/mvc5/framework/blob/master/src/Event/Manager/EventManager.php#L18) method of the [event manager](https://github.com/mvc5/framework/blob/master/src/Event/Manager/EventManager.php) accepts either the string name of the event, the event object itself or an array containing the event class name and its constructor arguments. In the example above, $controller is a constructor argument for the [controller dispatch event](https://github.com/mvc5/framework/blob/master/src/Controller/Dispatch/Dispatch.php).

## Event Configuration
Events and listeners are <a href="https://github.com/mvc5/application/blob/master/config/event.php">configurable</a> and support various types of configuration that must resolve to being a <a href="http://php.net/manual/en/language.types.callable.php">callable</a> type.

```php
'Mvc' => [
    'Mvc\Route',
    'Mvc\Controller',
    'Mvc\Layout',
    'Mvc\View',
    function($event, $vm) { //named args
        var_dump(__FILE__, $event, $vm);
    },
    'Mvc\Response'
]
```

## Dependency Injection
The [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) implements the [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface by extending the [service container](https://github.com/mvc5/framework/blob/master/src/Service/Container/ServiceContainer.php). The [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface provides access to existing services, and the [service container](https://github.com/mvc5/framework/blob/master/src/Service/Container/ServiceContainer.php) provides access to the [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object that contains the configuration values for the services that the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) provides.

Typically the [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) is the application's main [configuration object](https://github.com/mvc5/framework/blob/master/config/config.php).

```php
return [
    'alias'     => include __DIR__ . '/alias.php',
    'events'    => include __DIR__ . '/event.php',
    'services'  => new Container(include __DIR__ . '/service.php'),
    'routes'    => include __DIR__ . '/route.php',
    'templates' => include __DIR__ . '/templates.php'
];
```

This allows the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) to use the [param()](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php#L40) method to retrieve other configuration values, e.g 

```
new Param('templates.home')
```

When a service is called by the service manager's [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface, it will check that the service exists, and if it does not, it will use its [configuration](https://github.com/mvc5/framework/blob/master/config/service.php) to create a new service. Configuration values can also be actual values e.g 

```php
'Request' => new HttpRequest($_GET, $_POST, $_SERVER ...)
```

They can also be strings that specify the <a href="https://en.wikipedia.org/wiki/Fully_qualified_name">FQCN</a> of the class to instantiate and their required dependencies are automatically injected via [constructor autowiring](#constructor-autowiring). E.g 

```php
'Route\Match\Wildcard' => Route\Match\Wildcard\Wildcard::class,
```

Constructor arguments can also be passed as arguments to the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) when calling the service via the [create](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ManageService.php#L29) or [get](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ManageService.php#L57) method, e.g 

```php
$sm->get('HomeController', [new Dependency('HomeManager')])
```

Arguments passed to [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) will be used as constructor arguments. If no arguments are passed, the service can still be configured with constructor arguments via the [service configuration](https://github.com/mvc5/framework/blob/master/config/service.php).

```php
'Route\Generator' => new Service(
    Route\Generator\Generator::class,
    [new Param('routes'), new Dependency('Route\Builder')]
),
```

In the example above the [route generator](https://github.com/mvc5/framework/blob/master/src/Route/Generator/Generator.php) is created with the [routes](#routes) configuration passed as a constructor argument.

Sometimes only <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L147">calls</a> to the setter methods are needed, in which case the [hydrator](https://github.com/mvc5/framework/blob/master/src/Service/Config/Hydrator/Hydrator.php) configuration object can be used.

```php
'Controller\Manager' => new Hydrator(
    Controller\Manager\Manager::class,
    [
        'aliases'       => new Param('alias'),
        'configuration' => new ConfigLink,
        'events'        => new Param('events'),
        'services'      => new Param('services')
    ]
),
```

A [service configuration](https://github.com/mvc5/framework/blob/master/src/Service/Config/Configuration.php) can have parent configurations which allows either the parent constructor arguments to be used, if none are provided, or the parent configuration may specify the <a href="https://github.com/mvc5/framework/blob/master/src/Service/Config/Configuration.php#L21">calls</a> to use. It is also possible for a <a href="https://github.com/mvc5/framework/blob/master/src/Service/Config/Configuration.php">service configuration</a> to <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L258">merge</a> <a href="https://github.com/mvc5/framework/blob/master/src/Service/Config/Configuration.php#L21">calls</a> together.

```php
'Manager' => new Hydrator(null, [
    'aliases'       => new Param('alias'),
    'configuration' => new ConfigLink,
    'events'        => new Param('events'),
    'services'      => new Param('services'),
]),
```

The above [hydrator](https://github.com/mvc5/framework/blob/master/src/Service/Config/Hydrator/Hydrator.php) is used as a parent configuration for all <a href="https://github.com/mvc5/framework/blob/master/config/service.php#L57">Managers</a>.

```php
'Route\Manager' => new Manager(Route\Manager\Manager::class)
```

A [dependency configuration object](https://github.com/mvc5/framework/blob/master/src/Service/Config/Dependency/Dependency.php) is used to <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L345">retrieve</a> a shared service.

## Constructor Autowiring
When a [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) creates a class that either

* Does not have a service configuration, or
* No arguments are passed to the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php), or
* If the arguments passed are <a href="#named-arguments-and-plugins">named</a>

Then the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) will attempt to determine the required dependencies of the class constructor and their type hint. Service configurations can return any positive value.

```php
Home\Model::class => new Service(Home\Model::class,['home'])
```

When the name of a service configuration is a <a href="https://en.wikipedia.org/wiki/Fully_qualified_name">FQCN</a> it must have a value other than its string name, otherwise a recursion will occur.

```php
Home\Model::class => Home\Model::class //not allowed
```

Service configurations are only required when an explicit configuration is needed, and in some cases, can provide better runtime performance.

## Named Arguments and Plugins
This contrived example demonstrates named arguments and plugins.

```php
$web = new App(include __DIR__ . '/../config/config.php');

$response = $web->call(
    'Controller.valid.add.response',
    ['date_created' => time(), 'strict' => true]
);

var_dump($response instanceof Response);
```

The application is instantiated and a call is made to the valid method of the controller class with its parameters resolved from either the array of arguments explicitly passed to the [call](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L58) method or by the [call](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L58) method retrieving a plugin with the same name as the parameter. Methods can be chained together and each will have their parameters resolved similarly.

```php
class Controller
{
    protected $blog;

    function valid(Request $request, $strict)
    {
        var_dump($strict);
        
        return $this;
    }
    
    function add(Response $response, $date_created)
    {
        var_dump($date_created);
        
        $this->blog = new Blog;
        
        return $this;
    }
    
    function response(ViewManager $vm, Response $response, $args)
    {
        var_dump($this->blog, $args);
        return $response;
    }
}
```

The output of the above is ...

```php
boolean true

int 1414690433

object(Blog\Blog)[100]

array (size=2)
'date_created' => int 1414690433
'strict' => boolean true

boolean true
```

The parameter $args can be used as a named argument that provides an array of the named arguments available to that method.

To manage all of the parameters, an optional callback can be added to the call method, e.g

```php
$response = $web->call(
    'Controller.valid.add.response',
    [],
    function($name) { return new $name; }
);
```

## Plugins and Aliases
The parameter names of the additional arguments can be aliases or service names. An alias maps a string of varying characters excluding the [call separator](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Args.php#L23) `.` to any positive value. If the value is a [service configuration](https://github.com/mvc5/framework/blob/master/src/Service/Config/Configuration.php) object, then it will be resolved and its value returned.
Each plugin has a configuration specific to its own use and they are resolved each time they are used. This enables them to be used in various ways for different purposes, e.g to provide a value, or to trigger an event, or to call a particular service method.

```php
return [
    'blog:create'  => new Service('Blog\Create'),
    'config'       => new Dependency('Config'),
    'layout'       => new Dependency('Layout'),
    'request'      => new Dependency('Request'),
    'response'     => new Dependency('Response'),
    'route:create' => new Dependency('Route\Create'),
    'sm'           => new Dependency('Service\Manager'),
    'url'          => new Dependency('Route\Plugin'),
    'web'          => new Service('Mvc'),
    'vm'           => new Dependency('View\Manager')
];
```

Note that the [plugin](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ManageService.php#L63) method is used when calling an object.

```php
$this->call('blog:create');
```

Which means invoking a web application is no different to calling any other method, e.g

```php
$app = new Application($config);

$app->call('web'); //invoke web application (event)
```

And

```php
$app = new Application($config);

$app->call('request.getHost'); //get string hostname from the request object.
```

And with named arguments

```php
$app->call('Home\Factory', ['config' => $config, 'vm' => $vm]);
```

To get all of the available arguments that are not plugin arguments, add $args to the method signature

```php
public function __invoke(Config $config, ViewManager $vm, array $args = [])
{
    var_dump($args);
}
```

## Callable PHP Programming
<p>When the application is opened in the web browser the main <a href="https://github.com/mvc5/application/blob/master/public/index.php">public/index.php</a> script is called.</p>

```php
use Mvc5\Application\App;
use Mvc5\Application\Args;

include __DIR__ . '/../init.php';

(new App(include __DIR__ . '/../config/config.php'))->call(Args::WEB);

```

<p>After loading the <a href="https://github.com/mvc5/framework/blob/master/src/Application/App.php">application</a> with its <a href="https://github.com/mvc5/application/blob/master/config/config.php">configuration</a>, its <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L63">call</a> method is invoked with the string parameter <a href="https://github.com/mvc5/framework/blob/master/config/alias.php#L20">web</a> as the name of the function to call. The parameter passed to the call method must resolve to a <a href="http://php.net/manual/en/language.types.callable.php">callable</a> type, which means the parameter provided can also be an <a href="http://php.net/manual/en/functions.anonymous.php">anonymous function</a>.</p>
```php
(new App(include __DIR__ . '/../config/config.php'))->call(function($request, $response) {
    var_dump($request->getPathInfo());
});
```
<p>When the url in the web browser is changed from <code>/</code> to <code>/blog</code> the output of the application will be <code>/blog</code>. The parameters <a href="https://github.com/mvc5/framework/blob/master/config/alias.php#L13">$request</a> and <a href="https://github.com/mvc5/framework/blob/master/config/alias.php#L14">$response</a> are automatically resolved, because they are required by the anonymous function, as <a href="#named-arguments-and-plugins">named arguments</a> using the plugin <a href="https://github.com/mvc5/framework/blob/master/config/alias.php">alias</a> configuration. The above anonymous function is the only function called by the application, unlike the <a href="https://github.com/mvc5/framework/blob/master/config/alias.php#L20">web</a> function in the main <a href="https://github.com/mvc5/application/blob/master/public/index.php">public/index.php</a> script. The plugin alias configuration for the <a href="https://github.com/mvc5/framework/blob/master/config/alias.php#L20">web</a> function is below.</p>

```php
'web' => new Service('Mvc')
```

<p>In the following order, if there is no <a href="https://github.com/mvc5/framework/blob/master/config/alias.php">alias</a>, <a href="https://github.com/mvc5/framework/blob/master/config/service.php">service</a> or <a href="https://github.com/mvc5/framework/blob/master/config/event.php">event</a> configuration for the name web, then an error would occur as there isn't a callable PHP function with that name. However, one can be added to the main <a href="https://github.com/mvc5/application/blob/master/public/index.php">public/index.php</a> script. To easily test this, the name web2 should be used instead.</p>

```php
function web2($request, $response) {
    var_dump($request->getPathInfo());
}

(new App(include __DIR__ . '/../config/config.php'))->call('web2');
```

<p>Additionally, since the call method argument must resolve to a callable type, the <a href="https://github.com/mvc5/framework/blob/master/config/alias.php#L20">web</a> alias configuration can also be an anonymous function.</p>

```php
'web' => function($request, $response) {
    var_dump($request->getPathInfo());
}
```

<p>However, since its default value is a <a href="https://github.com/mvc5/framework/blob/master/src/Service/Config/Service/Service.php">Service</a> configuration, an actual <a href="https://github.com/mvc5/framework/blob/master/config/service.php#L62">service configuration</a> must exist.</p>

```php
'Mvc' => new Service(Mvc\Mvc::class, [new ServiceManagerLink]),
```

<p>Which means the <a href="https://github.com/mvc5/framework/blob/master/config/service.php#L62">service configuration</a> can also be an anonymous function that returns another one as the one to invoke.</p>

```php
'Mvc' => function() {
    return function($request, $response) {
        var_dump($request->getPathInfo());
    };
},
```

<p>This is the limit in which a single anonymous function can be used by the <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L63">call</a> method. There is also a limit in how much functionality can be obtained from a single function. Functions can become large and splitting them into a list of functions is beneficial since the function becomes an extensible list of functions each with their own specific dependencies injected. Consequently, the outcome of the function does not have to depend on the list of functions. By using an <a href="#events">event</a> class it is possible to control the outcome of each function and consequently the function itself.</p>

## Callable Events
<p>When there is no <a href="https://github.com/mvc5/framework/blob/master/config/alias.php">alias</a> or <a href="https://github.com/mvc5/framework/blob/master/config/service.php">service</a> configuration and the string function name is not <a href="http://php.net/manual/en/language.types.callable.php">callable</a>, the <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L63">call</a> method will <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L75">check</a> to see if an <a href="https://github.com/mvc5/framework/blob/master/config/event.php">event</a> configuration exists, if so, it will <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Event/Create.php">create</a> and <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L83">trigger</a> an event for that configuration. Otherwise an exception is <a href="https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L76">thrown</a> since nothing can be found for the name of that function. Read more about <a href="#events">events</a> and <a href="#named-arguments-and-plugins">named arguments</a>.</p>
 
```php
$config = include __DIR__ . '/../config/config.php';

$config['events']['web2'] = [
    function($request, $one) {
        ob_start();

        echo $one.'. One, ';
    },
    function($two, $request, $response) {
        echo $two.'. Two, ';
    },
    function($response) {
        echo '3. Three';

        $response->setContent(ob_get_clean());
    },
    function($response) {
        $response->send();
    }
];

(new App($config))->call('web2', ['one' => 1, 'two' => 2]);
```
