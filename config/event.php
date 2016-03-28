<?php
/**
 *
 */

use Mvc5\Plugin\Call;

return [
    'blog:add' => (object) [
        Blog\Add\Validate::class,
        Blog\Add\Save::class,
        Blog\Add\Respond::class
    ],
    'blog:remove' => [
        function() {
            return $model = '<h1>Validate</h1>';
        },
        function($model) {
            return $model . '<h1>Remove</h1>';
        },
        function($layout, $model = null) {
            $model .= '<h1>Respond</h1>';

            $model .= '<form method="POST"><input type="submit" name="submit" value="submit"></form><br>';

            $layout->model($model);

            return $layout;
        }
    ],

    /*'blog:remove' => new Call(function($event, $response, $args) {
        yield function($layout, $model = null) {
            $model .= '<h1>Blog\Remove</h1>';

            $layout->model($model);

            return $layout;
        };
    }),*/

    'service\resolver' => [
        function() {
            return null;
        },
        'service\provider',
        'resolver\exception'
    ],

    //uncomment for PSR-7
    /*'route\error' => [
        'error\handler',
        'error\status',
        'error\route',
        'error\controller',
        'error\layout',
        'error\view',
        'error\response',
    ],*/

    //uncomment for mvc and PSR-7
    /*
    'controller\exception' => [
        'exception\status',
        'exception\controller',
        'exception\view',
        'exception\response'
    ],
    'route\exception' => [
        'exception\status',
        'exception\route',
        'exception\controller',
        'exception\view',
        'exception\response'
    ],
    'view\exception' => [
        'exception\status',
        'exception\controller',
        'exception\view',
        'exception\response'
    ],
    */

    /**
     * Comment out 'mvc' and uncomment 'middleware' for the Middleware demo
     */
    'web' => [
        'mvc',
        //'middleware',
        'response\send'
    ],

] + include __DIR__ . '/../vendor/mvc5/framework/config/event.php';
