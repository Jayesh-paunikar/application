<?php
/**
 *
 */

use Mvc5\Model\Layout;
use Mvc5\Plugin\Call;
use Session\Session;

return [
    'blog:add' => new Mvc5\Object([
        Blog\Add\Validate::class,
        Blog\Add\Save::class,
        Blog\Add\Respond::class
    ]),
    'blog:remove' => [
        function() {
            return $model = '<h1>Validate</h1>';
        },
        function($model) {
            return $model . '<h1>Remove</h1>';
        },
        function(Layout $layout, Session $session, $model = null) {
            if ($session['success_message']) {
                $model .= '<h1>'.$session['success_message'].'</h1>';
                unset($session['success_message']);
            } else {
                $model .= '<h1>Respond</h1>';
            }

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

] + include __DIR__ . '/../vendor/mvc5/framework/config/event.php';
