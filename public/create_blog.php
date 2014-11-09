<?php
/**
 *
 */
use Blog\Blog;
use Framework\Application\App;
use Framework\View\Manager\ViewManager;
use Request\Request;
use Response\Response;

/**
 *
 */
include __DIR__ . '/../init.php';

/**
 *
 */

    class Controller
    {
        protected $blog;

        function valid(Request $request, $strict, callable $next)
        {
            var_dump($strict);

            return $next($this);
        }

        function add(Response $response, $date_created, $next)
        {
            var_dump($date_created);

            $this->blog = new Blog;

            return $next($this);
        }

        function response(ViewManager $vm, Response $response, $args)
        {
            var_dump($this->blog, $args);
            return $response;
        }
    }

/**
 *
 */
$web = new App(include __DIR__ . '/../config/web.php');

$response = $web->call(
    'Controller.valid.add.response',
    [
        'date_created' => time(),
        'strict' => true,
        'next' => function($current) {
            return $current;
        }
    ]
);

var_dump($response instanceof Response);
