Usage
--

```php
include __DIR__ . '/../vendor/autoload.php';
```
```php
use Framework\Config\Config;
use Framework\Service\Container\Container;
use Framework\Event\Config\Config as Events;

$config = new Config([
    'controllers' => new Events(include __DIR__ . '/controller.php'),
    'listeners'   => new Events(include __DIR__ . '/event.php'),
    'services'    => new Container(include __DIR__ . '/service.php'),
    'routes'      => new Config(include __DIR__ . '/route.php'),
    'translator'  => new Config(include __DIR__ . '/i18n.php'),
    'view'        => new Config(include __DIR__ . '/view.php')
]);
```
```php
(new Application($config))->run();
```
##Benchmark
*Current*
```
HTML transferred: 422918 bytes
Requests per second: 1262.95 [#/sec] (mean)
Time per request: 7.918 [ms] (mean)
Time per request: 0.792 [ms] (mean, across all concurrent requests)
```
*Other/Previous*
```
HTML transferred: 550200 bytes
Requests per second: 313.41 [#/sec] (mean)
Time per request: 31.907 [ms] (mean)
Time per request: 3.191 [ms] (mean, across all concurrent requests)
```
##Dependency Injection
```php
'Route\Match\Wildcard' => 'Framework\Route\Match\Wildcard\Wildcard',
```
```php
'Route\Generator' => new Service(
  'Framework\Route\Generator\Generator', 
  [new Param('routes.definitions')]
),
```
```php
'Controller\Manager' => new Hydrator(
    'Framework\Controller\Manager\Manager',
    [
        'configuration' => new ConfigLink,
        'events'        => new Param('controllers'),
        'services'      => new Param('services')
    ]
),
```
```php
'Mvc\SendResponse' => new Hydrator(
  'Framework\Mvc\SendResponse\Listener',
  [
    'setResponseManager' => new Dependency('Response\Manager')
  ]
),
```
The Dependency Injection <a href="https://github.com/mvc5/application/blob/master/config/service.php">Container</a> is an array containing the information about the services that it provides. Service configuration values can be string class names, `callable`, or configuration objects.
##Routes
Routes are pre-compiled so that they can be immediately matched against the request's uri path. Other aspects of the request and route can also be matched, e.g. scheme, hostname, method, wildcard. See the <a href="https://github.com/mvc5/application/blob/master/config/route.php">route config</a> for example child routes.
```php
'home' => new Definition([
  'name'       => 'home',
  'scheme'     => null,
  'hostname'   => null,
  'method'     => null,
  'route'      => '/',
  'defaults'   => [],
  'controller' => 'Home',
  'paramMap'   => [],
  'regex'      => '/',
  'tokens'     => [['literal', '/']]
])
```
##MVC
The MVC event workflow is completely <a href="https://github.com/mvc5/application/blob/master/config/event.php">configurable</a>.
```php
'Mvc\Event' => [
    ['Mvc\Route'],
    ['Mvc\Dispatch'],
    ['Mvc\Layout'],
    ['Mvc\Render'],
    ['Mvc\Response'],
    ['Mvc\SendResponse']
]
```
