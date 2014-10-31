This php framework provides an enhanced programming environment that uses events with named arguments and has an  optional configuration language that provides further inversion of control of the application. The configuration array can contain values, string names, callables and configuration objects that are resolved by the service manager.

This contrived example demonstrates the functionality of using named arguments
```php
$web = new App(include __DIR__ . '/../config/web.php');

$response = $web->call(
    'Controller.valid.add.response', 
    ['date_created' => time(), 'strict' => true]
);

var_dump($response instanceof Response);
```
The application is instatiated and a call is made to the `valid` method of the `Controller` class with its parameters resolved either from the array of arguments explicitly passed to the call method or by the call function retrieving a plugin with the same name as the parameter. Methods can be chained together and each will have their parameters resolved similarly.

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
`$args` is a special parameter that can be added to the method being called by the call function which provides an array of the named arguments.

To manage all of the parameters an optional callback can be added to call method, e.g
```php
$response = $web->call(
    'Controller.valid.add.response', 
    [], 
    function($name) { return new $name; }
);
```
##Events
Events can be strings or classes which can manage the arguments used for the parameters of the methods being invoked for that event. For a string event it would resort to using the service manager's plugin callback for all of the arguments used.
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
The callback used to provide the additional parameters not in the args array is provided by the service manager as `$this` or alternatively any callable type.
```php
$this->trigger([Dispatch::CONTROLLER, $controller], $args, $this);
```
##Plugins and Aliases
The parameter names of these additional arguments can be aliases or service names, and if an alias is not found then it is used as the service name. Aliases map strings of varying characters, excluding the call separator `.`, to service names or service calls. A service call is prefixed by the call symbol '@' and if the plugin object is an event, it is triggered and its value is returned instead.
```php
return [
    'blog:create' => 'Blog\Create',
    'blog:valid'  => '@Blog\Controller.valid',
    'config'      => 'Config',
    'layout'      => 'Layout',
    'request'     => 'Request',
    'sm'          => 'Service\Manager',
    'response'    => 'Response',
    'web'         => 'Mvc',
];

```
The plugin method is also used when calling an object
```php
//trigger create blog event
$this->call('blog:create');

//call the controller's valid method with supporting arguments
$this->call('blog:valid');

function valid(Config $config, Request $request);
```
Which means
```php
$app = new Application($config);

$app->call('web'); //invoke web application
```
And
```php
$app = new Application($config);

$app->call('request.getHost'); //get string hostname from the request object.

```
Named arguments are also supported
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
The <a href="https://github.com/mvc5/application">mvc5/application</a> demonstrates its usage as an MVC web application.

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
    'routes'      => include __DIR__ . '/route.php',
    'translator'  => include __DIR__ . '/i18n.php',
    'view'        => include __DIR__ . '/view.php'
]);
```
```php
call_user_func(new Web(include __DIR__ . '/../config/web.php'));
```
##Benchmark
*Current*
```
HTML transferred:       4229135 bytes
Requests per second:    1290.86 [#/sec] (mean)
Time per request:       7.747 [ms] (mean)
Time per request:       0.775 [ms] (mean, across all concurrent requests)
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
The Dependency Injection <a href="https://github.com/mvc5/application/blob/master/config/service.php">Container</a> is an array containing the information about the services that it provides. Service configuration values can be string class names, `callable`, or configuration objects.
##Routes
Routes are pre-compiled so that they can be immediately matched against the request's uri path. Other aspects of the request and route can also be matched, e.g. scheme, hostname, method, wildcard. See the <a href="https://github.com/mvc5/application/blob/master/config/route.php">route config</a> for example child routes.
```php
'home' => new Definition([
  'name'        => 'home',
  'scheme'      => null,
  'hostname'    => null,
  'method'      => null,
  'route'       => '/',
  'defaults'    => [],
  'controller'  => 'Home',
  'paramMap'    => [],
  'regex'       => '/',
  'tokens'      => [['literal', '/']],
  'constraints' => []
])
```
##Event Configuration
Events and listeners are <a href="https://github.com/mvc5/application/blob/master/config/event.php">configurable</a> and support various types of configuration that must resolve to being a callable listener.
```php
'Mvc' => [
    ['Mvc\Route'],
    ['Mvc\Dispatch'],
    ['Mvc\Layout'],
    ['Mvc\Render'],
    ['Mvc\Response']
]
```
