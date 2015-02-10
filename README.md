[![Build Status](https://scrutinizer-ci.com/g/mvc5/framework/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mvc5/framework/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/mvc5/framework/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mvc5/framework/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mvc5/framework/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mvc5/framework/?branch=master)  
[![Build Status](https://api.travis-ci.org/mvc5/application.svg)](https://travis-ci.org/mvc5/framework)
[![Test Coverage](https://codeclimate.com/github/mvc5/framework/badges/coverage.svg)](https://codeclimate.com/github/mvc5/framework)
[![Code Climate](https://codeclimate.com/github/mvc5/framework/badges/gpa.svg)](https://codeclimate.com/github/mvc5/framework)  
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/6a19e4e3-e771-46e3-9f10-fe1c06837f43/big.png)](https://insight.sensiolabs.com/projects/6a19e4e3-e771-46e3-9f10-fe1c06837f43)  
[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/mvc5/framework?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)  
  
Welcome to an enhanced php 5.5 programming environment that provides inversion of control of a web application or any function.
  
##Features
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

All of the components require dependency injection and use [`Configuration`](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) objects for consistency and ease of use. For example, the [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) is a [`Configuration`](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object that manages its services via the standard configuration interface, and has additional [`ServiceContainer`](https://github.com/mvc5/framework/blob/master/src/Service/Container/ServiceContainer.php) methods that manage the underlying configurations of the services that it provides. The main [configuration array](https://github.com/mvc5/framework/blob/master/config/service.php) can contain values, string names, callables and configuration objects that are resolvable by the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php).

##Demo
The [symfony/HttpFoundation](https://github.com/symfony/HttpFoundation) `Request` and `Response` objects are used in the <a href="https://github.com/mvc5/application">mvc5/application</a>. Dependency injection shows that components do not require any knowledge of the `Request` object. However, currently the `Response` object must implement the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) interface so that its status and content can be set. Its content must allow any positive value and may be considered as a `Response Model`.

##Maintainability
_[View the interactive PhpMetrics report](http://mvc5.github.io/tests/maintainability/)_  
  
[![](https://raw.githubusercontent.com/mvc5/tests/master/public/images/phpmetric-maintenability.png)](http://mvc5.github.io/tests/maintainability/)[![](https://raw.githubusercontent.com/mvc5/tests/master/public/images/phpmetric-evaluation.png)](http://mvc5.github.io/tests/maintainability/)  [![](https://raw.githubusercontent.com/mvc5/tests/master/public/images/phpmetric-eval-report.png)](http://mvc5.github.io/tests/maintainability/)  
[![](https://raw.githubusercontent.com/mvc5/tests/master/public/images/phpmetric-custom.png)](http://mvc5.github.io/tests/maintainability/)[![](https://raw.githubusercontent.com/mvc5/tests/master/public/images/phpmetric-abstractness.png)](http://mvc5.github.io/tests/maintainability/)

##Named Arguments and Plugins
This contrived example demonstrates named arguments and plugins.
```php
$web = new App(include __DIR__ . '/../config/web.php');

$response = $web->call(
    'Controller.valid.add.response', 
    ['date_created' => time(), 'strict' => true]
);

var_dump($response instanceof Response);
```
The application is instantiated and a call is made to the `valid` method of the `Controller` class with its parameters resolved from either the array of arguments explicitly passed to the [`call`](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L58) method or by the [`call`](https://github.com/mvc5/framework/blob/master/src/Service/Resolver/Resolver.php#L58) method retrieving a plugin with the same name as the parameter. Methods can be chained together and each will have their parameters resolved similarly.

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
The parameter `$args` can be used as a `named argument` that provides an `array of the named arguments` available to that method.

To manage all of the parameters an optional callback can be added to the call method, e.g
```php
$response = $web->call(
    'Controller.valid.add.response', 
    [], 
    function($name) { return new $name; }
);
```
##Events
Events can be strings or classes that can manage the arguments used by the methods that are invoked in that event.
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
The callable `$callback` parameter can be used to provide any additional parameters not in the named `$args` array. It can be a service manager, e.g `$this`, or any callable type.
```php
$this->trigger([Dispatch::CONTROLLER, $controller], $args, $this);
```
Similar to `$args`, adding `$event` will provide the current event.

The `trigger()` method of the [`EventManager`](https://github.com/mvc5/framework/blob/master/src/Event/Manager/EventManager.php) accepts either the string name of the event, the event object itself or an `array` containing the event class name and its constructor arguments. In the example above `$controller` is a constructor argument for the [`Controller Dispatch Event`](https://github.com/mvc5/framework/blob/master/src/Controller/Dispatch/Dispatch.php).

##Plugins and Aliases
The parameter names of the additional arguments can be aliases or service names. An alias maps a string of varying characters excluding the call separator `.` to any positive value. If the value is a configuration object, then it will be resolved and its value returned.
Each plugin has a configuration specific to its own use and they are resolved each time they are used. This enables them to be used in various ways for different purposes, e.g to provide a value or to trigger an event or to call a particular service method.
```php
return [
  'blog:create' => new Service('Blog\Create'),
  'blog:valid'  => new Invoke('Blog\Controller\Validate', ['model' => new Model('blog:create')]),
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
The [`plugin`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ManageService.php#L63) method is also used when calling an object.
```php
//trigger create blog event
$this->call('blog:create');

//call the controller's valid method with supporting arguments
$this->call('blog:valid');

function valid(Config $config, Request $request);
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
$app->call(
  'Blog\Controller.valid', 
  ['config' => $config, 'request' => $request]
);
```
To get all of the available arguments that are not plugin arguments, add `$args` to the method signature
```php
public function __invoke(Config $config, ViewManager $vm, array $args = [])
{
    var_dump($args);
}
```
##Usage
The <a href="https://github.com/mvc5/application">mvc5/application</a> demonstrates its usage as a web application.

```php
include __DIR__ . '/../vendor/autoload.php';
```
```php
use Framework\Config\Config;
use Framework\Service\Container\Container;
use Framework\Event\Config\Config as Events;

$config = new Config([
  'alias'     => include __DIR__ . '/alias.php',
  'events'    => new Events(include __DIR__ . '/event.php'),
  'services'  => new Container(include __DIR__ . '/service.php'),
  'routes'    => new RouteDefinition(include __DIR__ . '/route.php'),
  'templates' => new Config(include __DIR__ . '/templates.php')
]);
```
```php
call_user_func(new Web(include __DIR__ . '/../config/web.php'));

// or 
// (new App($config))->call('web');
```
##Web Application
A default [`Configuration`](https://github.com/mvc5/framework/blob/master/config/config.php) is provided with the minimum [configuration](https://github.com/mvc5/framework/blob/master/config) required to run a web application. Then, all that is required are the `Request` and `Response` objects, template configuration and the routes to use. Routes must have a name, so that they can be used to build urls in the view templates when using the [`url plugin`](https://github.com/mvc5/framework/blob/master/config/alias.php#L18).
```php
$app = new App(include __DIR__ . '/../vendor/mvc5/framework/config/config.php');

call_user_func($app);
```
##Benchmark
*Current*
```
HTML transferred:       9472167 bytes
Requests per second:    1112.89 [#/sec] (mean)
Time per request:       8.986 [ms] (mean)
Time per request:       0.899 [ms] (mean, across all concurrent requests)
```
*Other/Previous*
```
HTML transferred:       5502000 bytes
Requests per second:    315.78 [#/sec] (mean)
Time per request:       31.667 [ms] (mean)
Time per request:       3.167 [ms] (mean, across all concurrent requests)
```
##Source Lines of Code
```
SLOC	Directory	SLOC-by-Language (Sorted)
1014    Service         php=1014
864     Route           php=864
379     View            php=379
249     Controller      php=249
208     Mvc             php=208
198     Response        php=198
112     Event           php=112
92      Config          php=92
32      Application     php=32

Totals grouped by language (dominant language first):
php:           3148 (100.00%)
```
_Generated using [David A. Wheeler's 'SLOCCount'](http://www.dwheeler.com/sloccount)._
##Dependency Injection
The [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) implements the [`Configuration`](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface by extending the [`ServiceContainer`](https://github.com/mvc5/framework/blob/master/src/Service/Container/ServiceContainer.php). The [`Configuration`](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface provides access to existing services, and the [`ServiceContainer`](https://github.com/mvc5/framework/blob/master/src/Service/Container/ServiceContainer.php) provides access to the [`Configuration`](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object that contains the configuration values for the services that the [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) provides.

Typically the [`Configuration`](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) is the application's main [configuration object](https://github.com/mvc5/framework/blob/master/config/config.php).
```php
return new Config([
  'alias'     => include __DIR__ . '/alias.php',
  'events'    => new Events(include __DIR__ . '/event.php'),
  'services'  => new Container(include __DIR__ . '/service.php'),
  'routes'    => new RouteDefinition(include __DIR__ . '/route.php'),
  'templates' => new Config(include __DIR__ . '/templates.php')
]);
```
This allows the [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) to use the [`param()`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php#L40) method to retrieve other configuration values, e.g `new Param('templates.home')`.

When a service is called by the service manager's [`Configuration`](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface, it will check if the service exists, and if it does not, it will use its configuration to create a new service. Configuration values can also be actual values e.g `'Request' => new HttpRequest($_GET, $_POST, $_SERVER ...)`.

They can also be strings that specify the `FQCN` of the class to instantiate. However, since no dependencies are specified these classes cannot require any constructor arguments unless they are passed as arguments to the [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) when calling the service, i.e. via either the `create` or `get` methods e.g `$sm->get('HomeController', [new Dependency('HomeManager')])`.
```php
'Route\Match\Wildcard' => Route\Match\Wildcard\Wildcard::class,
```
There is no convention on how dependencies should be injected, however arguments passed to [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) will be used as constructor arguments. If no arguments are passed, the service can still be configured with constructor arguments via the [`Service`](https://github.com/mvc5/framework/blob/master/src/Service/Config/Configuration.php) configuration.
```php
'Route\Generator' => new Service(
  Route\Generator\Generator::class, 
  [new Param('routes'), new Dependency('Route\Builder')]
),
```
In the example above the `Route\Generator` is created with the `routes` configuration passed as a constructor argument, then a call is made to the new object's `setRouteManager` to inject the `Route\Manager` as a shared dependency.

Sometimes only the `setter methods` or `calls` are needed, in which case the [`Hydrator`](https://github.com/mvc5/framework/blob/master/src/Service/Config/Hydrator/Hydrator.php) configuration object is used.
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
A [`Service Configuration`](https://github.com/mvc5/framework/blob/master/src/Service/Config/Configuration.php) can have parent configurations which allows either the parent constructor arguments to be used, if none are provided, or the parent configuration may specify the `calls` to use. It is also possible for service configurations to merge their `calls` together.
```php
'Manager' => new Hydrator(null, [
  'aliases'       => new Param('alias'),
  'configuration' => new ConfigLink,
  'events'        => new Param('events'),
  'services'      => new Param('services'),
]),
```
The above `Hydrator` is used as a parent configuration for all `Managers`.
```php
'Route\Manager' => new Manager(Route\Manager\Manager::class)
```
A [`Dependency`](https://github.com/mvc5/framework/blob/master/src/Service/Config/Dependency/Dependency.php) configuration object is used to retrieve a shared service.
##Constructor Autowiring
When a [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) creates a class that either
* Does not have a service configuration, or 
* No arguments were passed to the [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php), or 
* If the arguments passed are `named`  
  
Then the [`ServiceManager`](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) will attempt to determine the *required* dependencies of the class constructor by their type hint or parameter name. Service configurations can return any positive value.
```php
Home\Model::class => new Service(Home\Model::class,['home'])
```
When the name of a service configuration is a `FQCN` it must have a value other than its string name, otherwise a recursion will occur.
```php
Home\Model::class => Home\Model::class //not allowed
```
Service configurations are only required when an explicit configuration is needed, and in some cases, can provide better runtime performance.
##Routes
A route can be configured as an `array` or as a `RouteDefinition`. If the configuration does not have a `regex`, then it will be compiled before matching against the request uri path. Each aspect of matching a route has a dedicated function, e.g. scheme, hostname, path, method, wildcard, and any other function can be configured to be called in the [`Route Match Event`](https://github.com/mvc5/framework/blob/master/src/Route/Match/Match.php).

In order to create a url using the `Route\Plugin`, e.g a view helper plugin, the first route must have a name that can be referred to as the base route, which is typically the homepage for `/`, e.g `home`, or it can specify its own, e.g `/home`. Child routes, except for the first level, will automatically have their parent name prepended to their name e.g `application/dashboard`. First level routes will not have the parent route prepended as it keeps their name simpler to use when specifying which route to create e.g `application` instead of `home/application`.

The `controller` param must be a service configuration value (which includes real values) that must resolve to a callable type. In the example below, `@Home.test` will call the `test` method on a shared instance of `Home`. If no configuration for `Home` exists, a new instance will be created via [Constructor Autowiring](#Constructor Autowiring).

Controller configurations that are prefixed with an `@` will be called as a plugin, so its `alias` configuration must resolve to a callable type. In the example below, `@blog:create` is an `alias` to a `Blog Create Event` and is triggered as an event instead calling a single method.

Constraints have named keys that match the name of its corresponding `regex` parameter, optional parameters are enclosed with the square brackets `[]`.

Route definitions implement the [`Configuration`](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) interface which enables each definition to have their own set of configuration values that could then be used by any function called during the [`Route Match Event`](https://github.com/mvc5/framework/blob/master/src/Route/Match/Match.php).
```php
return [
    'name'       => 'home', //name required for url generator
    'route'      => '/',
    'controller' => 'Home',
    'children' => [
      'application' => [
          'route'      => '/application',
          'controller' => '@Home.test',
          'children' => [
              'default' => [
                  'route'      => '/:sort[/:order]',
                  'controller' => '@blog:create', //call event (trigger)
                  //'controller'  => function($model) { //named args
                    //return $model;
                  //},
                  'constraints' => [
                      'sort'  => '[a-zA-Z0-9_-]*',
                      'order' => '[a-zA-Z0-9_-]*'
                  ]
              ]
          ],
      ]
    ]  
];
```
The route names are used by the url `Route\Generator`, e.g
```php
echo $this->url('application/default', ['sort' => 'name', 'order' => 'desc']);
```
##Event Configuration
Events and listeners are <a href="https://github.com/mvc5/application/blob/master/config/event.php">configurable</a> and support various types of configuration that must resolve to being a `callable` type.
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
##Model View Controller
Controllers can use a [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object as a [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) object that is rendered by the view using its specified template file name and an optional child model that is used by the [layout model](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php). For convenience, controllers can use an existing [view model trait](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php) that has methods for setting the model and returning it. If no model is injected, then a new instance of a standard model will be created and returned. When a controller is invoked and returns a model, it is stored as the content of the response object and will be rendered prior to sending the response. The [view model trait](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php) has two methods

* [model](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L28) 
* [view](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L44)

This allows the controller to choose the [view](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L44) method when a specific template is known, or the controller can use the [model](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L28) method and pass an array variables as the data for the view model.

```php
use Framework\View\ViewModel;

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
##Controller Action
The [`ControllerAction`](https://github.com/mvc5/framework/blob/master/src/Service/Config/ControllerAction/ControllerAction.php) configuration is for an [`Action Controller Event`](https://github.com/mvc5/framework/blob/master/src/Controller/Action/Action.php) which accepts an array of functions that are called with named argument plugin support. If the response from the function is a [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php), it will be stored and available to subsequent functions. If the function returns a [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php), then the event is stopped and the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) is returned.
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
##Rendering View Models
When the content of the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) is a [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php), it is [rendered](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) prior to sending the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php). Additionally and [prior](https://github.com/mvc5/framework/blob/master/config/event.php#L19) to [rendering](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) the [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php), if a [`LayoutModel`](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php) is to be used, it will add the current [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) to itself as its content child model and the [`LayoutModel`](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php) is then set as the content of the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php).
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
The [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) is then rendered via the [`View Render Event`](https://github.com/mvc5/framework/blob/master/src/View/Render/Render.php) which allows other renderers to be configured and used instead of the default [`View\Renderer`](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php).

The [`View\Renderer`](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) will bind the [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) to a `Closure` that will extract the view model's variables and then include the view model's template file. The scope of the template is the view model itself which gives the template access to any of the view model's private and protected variables and functions. 
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
##View Model Plugins
The default [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) also supports [plugins](https://github.com/mvc5/framework/blob/master/config/alias.php) which require the [`ViewManager`](https://github.com/mvc5/framework/blob/master/src/View/Manager/ViewManager.php) to be injected prior to [rendering](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) it. And because they can be created by a controller, this may not of happened. To overcome this, the current [`ViewManager`](https://github.com/mvc5/framework/blob/master/src/View/Manager/ViewManager.php) will be injected if the [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) does not already have one.
```php
<?php

/** @var Framework\View\Model\ViewModel $this */

echo $this->url('home');
```
##Configuration and ArrayAccess
The [`Configuration`](/mvc5/framework/blob/master/src/Config/Configuration.php) interface is used consistently throughout each component in order to provide a standard set of *concrete* configuration methods. Its [`ArrayAccess`](http://php.net/manual/en/class.arrayaccess.php) interface enables the [`ServiceManager`](/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php) to retrieve nested configuration values by making successive calls on the returned values. E.g
```php
new Param('templates.error');
```
Resolves to
```php
$config['templates']['error'];
```
Which makes it possible to use either an `array` or a [`Configuration`](/mvc5/framework/blob/master/src/Config/Configuration.php) object when references are needed, e.g [templates and aliases](https://github.com/mvc5/framework/blob/master/config/config.php#L12).
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
By implementing the [`Configuration`](/mvc5/framework/blob/master/src/Config/Configuration.php) interface it allows components to only have to specify their *immutable* interface methods and allows the component to choose whether or not to extend the [`Configuration`](/mvc5/framework/blob/master/src/Config/Configuration.php) interface or to implement it separately. The idea is that most of the time, only the *immutable* interface methods are of interest and the configuration interface provides a consistent way of instantiating its configuration.
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
Constants can be used by other components to update the configuration object via `ArrayAccess`
```php
$route[Route::PATH] = '/home';
//or
$route->set(Route::PATH, '/home');
```
