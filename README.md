This is an enhanced php programming environment that uses events, named arguments and an optional configuration that provides further inversion of control of the application. The [configuration array](https://github.com/mvc5/application/blob/master/config/service.php) can contain values, string names, callables and configuration objects that are resolved by the [service manager](https://github.com/mvc5/framework/blob/master/src/Service/Manager/ServiceManager.php).

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
The output of the above is
```php
boolean true

int 1414690433

object(Blog\Blog)[100]

array (size=2)
  'date_created' => int 1414690433
  'strict' => boolean true

boolean true
```
The parameter `$args` can be used as a named argument that provides an array of the named arguments available to that method.

To manage all of the parameters an optional callback can be added to call method, e.g
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
      return $this->signal($listener, $this->args() + $args, $callback);
  }
}
```
The callable `$callback` parameter can be used to provide any additional parameters not in the named `$args` array. It can be a service manager, e.g `$this`, or any callable type.
```php
$this->trigger([Dispatch::CONTROLLER, $controller], $args, $this);
```
Similar to `$args`, adding `$event` will provide the current event.

##Plugins and Aliases
The parameter names of the additional arguments can be aliases or service names. An alias maps a string of varying characters excluding the call separator `.` to any positive value. If the value is a configuration object then it will be resolved and its value returned.
Each plugin has its own configuration specific to its own use. This enables them to be used in various ways for different purposes, e.g to provide a value or to trigger an event or to call a particular service method.
```php
return [
    'blog:create' => new Service('Blog\Create'),
    'blog:valid'  => new Invoke('Blog\Controller.valid'),
    'config'      => new Dependency('Config'),
    'layout'      => new Dependency('Layout'),
    'request'     => new Dependency('Request'),
    'sm'          => new Dependency('Service\Manager'),
    'response'    => new Dependency('Response'),
    'pathinfo'    => new Call('request.getPathInfo'),
    'url'         => new Dependency('Route\Generator\Plugin'),
    'web'         => new Service('Mvc')
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
Usage
--
The <a href="https://github.com/mvc5/application">mvc5/application</a> demonstrates its usage as a web application.

```php
include __DIR__ . '/../vendor/autoload.php';
```
```php
use Framework\Config\Config;
use Framework\Service\Container\Container;
use Framework\Event\Config\Config as Events;

$config = new Config([
    'alias' => [
        'web' => 'Mvc',
    ],
    'events'      => new Events(include __DIR__ . '/event.php'),
    'services'    => new Container(include __DIR__ . '/service.php'),
    'routes'      => new RouteDefinition(['children' => include __DIR__ . '/route.php']),
    'view'        => include __DIR__ . '/view.php'
]);
```
```php
call_user_func(new Web(include __DIR__ . '/../config/web.php'));

// or 
// (new App($config))->call('web');
```
###Microframework Support
```php
$app = new Web(include __DIR__ . '/../vendor/mvc5/framework/config/config.php');

//services via ArrayAccess
$app['Request']  = new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER);
$app['Response'] = new Response\HttpResponse;

//configuration via property access
$app->templates['layout'] = '../view/layout/layout.phtml';
$app->templates['home']   = '../view/home/index.phtml';

$app->route(['home', '/'], function(array $args = []) {
    $args['app_demo'] = 'app:home';

    return new Model('home', ['args' => $args]);
});

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
##Dependency Injection
```php
'Route\Match\Wildcard' => Framework\Route\Match\Wildcard\Wildcard::class,
```
```php
'Route\Generator' => new Service(
  Framework\Route\Generator\Generator::class, 
  [new Param('routes.definitions')]
),
```
```php
'Controller\Manager' => new Hydrator(
    Framework\Controller\Manager\Manager::class,
    [
        'configuration' => new ConfigLink,
        'events'        => new Param('controllers'),
        'services'      => new Param('services')
    ]
),
```
The [configuration](https://github.com/mvc5/application/blob/master/config/service.php) of the [`Service Container`](https://github.com/mvc5/framework/blob/master/src/Service/Container/ServiceContainer.php) is an array containing values, string names, `callable` types and configuration objects.
##Routes
A route can be configured as an `array` or as a pre-compiled `RouteDefinition` that can be matched immediately against the request's uri path. Other aspects of the request and route can also be matched, e.g. scheme, hostname, method, wildcard. See the [route config](https://github.com/mvc5/application/blob/master/config/route.php) for example child routes.
```php
return [
    'home' => [
        'name'       => 'home',
        'route'      => '/',
        'controller' => 'Home'
    ],
    'application' => [
        'name'       => 'application',
        'route'      => '/application',
        'controller' => '@Home.test',
        'children' => [
            'default' => [
                'name'       => 'default',
                'route'      => '/:sort[/:order]',
                'controller' => '@blog:create', //call event (trigger)
                'constraints' => [
                    'sort'  => '[a-zA-Z0-9_-]*',
                    'order' => '[a-zA-Z0-9_-]*'
                ]
            ]
        ],
    ]
];
```
The route names are used by the url `Route\Generator`, e.g
```php
echo $this->url('application/default', ['sort' => 'name', 'order' => 'desc']);
```
Below is the route configured via the microframework interface.
```php
$app->route(['application/default', '/:sort[/:order]'], function(array $args = []) {
    return $this->call('blog:create');
});
```
##Event Configuration
Events and listeners are <a href="https://github.com/mvc5/application/blob/master/config/event.php">configurable</a> and support various types of configuration that must resolve to being a `callable` type.
```php
'Mvc' => [
    ['Mvc\Route'],
    ['Mvc\Dispatch'],
    ['Mvc\Layout'],
    ['Mvc\Render'],
    [function($event, $vm) { //named args
        var_dump(__FILE__, $event, $vm);
    }],
    ['Mvc\Response']
]
```
##Model View Controller
Controllers can use a [configuration](https://github.com/mvc5/framework/blob/master/src/Config/Configuration.php) object as a [view model](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) object that is rendered by the view using its specified template file name and an optional child model that is used by the [layout model](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php). For convenience, controllers can use an existing [view model trait](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php) that has methods for setting the model and returning it. If no model is injected then a new instance of a standard model will be created and returned. When a controller is invoked and returns a model, it is stored as the content of the response object and will be rendered prior to sending the response. The [view model trait](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php) has two methods

* [model](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L28) 
* [view](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L44)

This allows the controller to choose the [view](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L44) method when a specific template is known, or the controller can use the [model](https://github.com/mvc5/framework/blob/master/src/View/Model/Service/ViewModel.php#L28) method and pass an array variables as the data for the view model.

```php
use Framework\View\Model\Service\ViewModel;

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
The [`ControllerAction`](https://github.com/mvc5/framework/blob/master/src/Service/Config/ControllerAction/ControllerAction.php) configuration is for an [`Action Controller Event`](https://github.com/mvc5/framework/blob/master/src/Controller/Action/Action.php) which accepts an array of functions that are called with named argument plugin support. If the response from the function is a [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) it will be stored and available to subsequent functions. If the function returns a [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) then the event is stopped and the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) is returned.
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
###Rendering View Models
When the content of the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) is a [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) it is [rendered](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) prior to sending the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php). Additionally and [prior](https://github.com/mvc5/framework/blob/master/config/event.php#L19) to [rendering](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) the [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php), if a [`LayoutModel`](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php) is to be used, it will add the current [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) to itself as its content child model and the [`LayoutModel`](https://github.com/mvc5/framework/blob/master/src/View/Layout/LayoutModel.php) is then set as the content of the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php) so that it will be [rendered](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) prior to sending the [`Response`](https://github.com/mvc5/framework/blob/master/src/Response/Response.php).
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
###View Model Plugins
The default [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) also supports [plugins](https://github.com/mvc5/framework/blob/master/config/alias.php) which require the [`ViewManager`](https://github.com/mvc5/framework/blob/master/src/View/Manager/ViewManager.php) to be injected prior to [rendering](https://github.com/mvc5/framework/blob/master/src/View/Renderer/RenderView.php) it. And because they can be created by a controller, this may not of happened. To overcome this, the current [`ViewManager`](https://github.com/mvc5/framework/blob/master/src/View/Manager/ViewManager.php) will be injected if the [`ViewModel`](https://github.com/mvc5/framework/blob/master/src/View/Model/ViewModel.php) does not already have one.
```php
<?php

/** @var Framework\View\Model\ViewModel $this */

echo $this->url('home');
```
###Configuration and ArrayAccess
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
By implementing the [`Configuration`](/mvc5/framework/blob/master/src/Config/Configuration.php) interface it allows components to only have to specify their *immutable* interface methods and allows the component to choose whether or not to extend the [`Configuration`](/mvc5/framework/blob/master/src/Config/Configuration.php) interface or to implement it separately. The idea is that most of the time only the *immutable* interface methods is of interest and the configuration interface simply provides a consistent way of instantiating its configuration.
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
$route[$route::PATH] = '/home';
```
