<?php
/**
 *
 */
use Framework\Application\Web;
use Framework\View\Model\Model;
use Framework\Service\Config\ControllerAction\ControllerAction;

/**
 *
 */
$memoryUsage = memory_get_usage();

/**
 * Decline static file requests back to the PHP built-in webserver
 */
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

/**
 *
 */
include __DIR__ . '/../init.php';

/**
 *
 */
$app = new Web(include __DIR__ . '/../config/web.php');

//demo micro framework
/**$app = new Web(include __DIR__ . '/../vendor/mvc5/framework/config/config.php');

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

$app->route('application', function(array $args = []) {
    $args['app_demo'] = 'app:application';

    return new Model('home', ['args' => $args]);
});

$app->route(['application/default', '/:controller[/:action]'], function(array $args = []) {
    $args['app_demo'] = 'app:application';

    return new Model('home', ['args' => $args]);
});

$app->route('demo', function(array $args = []) {
    $args['app_demo'] = 'app:demo';

    return new Model('home', ['args' => $args]);
});

$app->route('demo/default', function(array $args = []) {
    $args['app_demo'] = 'app:demo:default';

    $args['demo_time'] = $this->call('time');

    return new Model('home', ['args' => $args]);
});

$app->route('demo/default/three', function(array $args = []) {
    $args['app_demo'] = 'app:demo:default:three';

    $args['demo_time'] = $this->call('time');

    return new Model('home', ['args' => $args]);
});

$app->route('demo/create', new ControllerAction([
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
]));
*/
/**
 *
 */
call_user_func($app);

/**
 *
 */
$totalMemory = number_format(memory_get_usage() / 1048576, 3);
$memoryStart = number_format($memoryUsage / 1048576, 3);
$memoryUsed = number_format((memory_get_usage() - $memoryUsage) / 1048576, 3);

$msg = "Total Memory: $totalMemory MB\n"
    . "Memory Start: $memoryStart MB\n"
    . "Memory Usage: $memoryUsed MB\n"
    . "Memory Peak Usage: "
    . number_format(memory_get_peak_usage(true) / 1048576, 3) . " MB\n";

$parseTime = number_format(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 3);

$msg .= 'Parse Time: ' . $parseTime . 's = ' . ($parseTime  * 1000) . 'ms';

echo "\n", '<!-- ', $msg, '-->', "\n";
