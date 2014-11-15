<?php
/**
 *
 */
use Micro\Micro;
use Framework\View\Model\Model;

/**
 *
 */
include __DIR__ . '/../init.php';

/**
 *
 */
$app = new Micro(include __DIR__ . '/../config/micro/micro.php');

/**
 *
 */
$app->route('home', '/', function($vm, array $args = []) {

    $args['micro_route'] = 'micro:home';

    //$vm is a named argument plugin
    $args['demo_time'] = $vm->call('time');

    return new Model('home', ['args' => $args]);
});

$app->route('application', '/application', function(array $args = []) {

    $args['micro_route'] = 'micro:application';

    return new Model('home', ['args' => $args]);
});

$app->route('application/default', '/default/:controller[/:action]', function(array $args = [], $vm) {

    $args['micro_route'] = 'micro:application:default';

    //$vm is a named argument plugin
    $args['demo_time'] = $vm->call('time');

    return new Model('home', ['args' => $args]);
});

call_user_func($app);
