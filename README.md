This event management system supports named arguments and uses dependency injection to create its listeners and their depencies just in time before they are called. The system's configuration is an array that contains values, string names, callables and certain configuration objects that the service manager knows how to resolve.

```php
'Request'  => new Service(
  Request\Request::class, 
  [$_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER]
),
```
The above will pass the array of arguments as constructor values in that set order. This goes in hand with the service manager's get and create methods
```php
function get($name, array $args = [], callable $callback = null);

function create($config, array $args = [], callable $callback = null);
```
The callback is used when a service cannot be created for a particular string name, allowing the calling service the opportunity to provide the service or to handle the impending error. Otherwise the get/create methods will still try to instantiate the class even though it does not exist; causing an error to occur. The plugin method is used when an error is not wanted while still supporting the callback for when the string name cannot be found; in which case an empty function is used.

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
The parameter names of these additional arguments can be aliases or service names, and if an alias is not found then it is used as the service name. Aliases map strings of varying characters, excluding the call separator `.`, to service names or service calls. A service call is prefixed by the call symbol '@' and if the plugin object is an event is is triggered and its value is returned instead.
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

function valid(Request $request);
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
$app->call('Blog\Controller.valid', ['config' => $config, 'request' => $request]);
```
To all of the available arguments that are not plugin arguments, add `$args` to the method signature
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
##MVC
The MVC event workflow is <a href="https://github.com/mvc5/application/blob/master/config/event.php">configurable</a>.
```php
'Mvc' => [
    ['Mvc\Route'],
    ['Mvc\Dispatch'],
    ['Mvc\Layout'],
    ['Mvc\Render'],
    ['Mvc\Response']
]
```
