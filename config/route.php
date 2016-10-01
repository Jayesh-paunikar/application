<?php
/**
 *
 */

use Mvc5\Response\Redirect;
use Mvc5\Session\Session;
use Mvc5\Url\Plugin as Url;

return [
    'name'       => 'home', //for the url plugin in view templates
    'route'      => '/',
    'controller' => 'Home\Controller', //callable
    //'method' => 'POST',
    //'controller' => '@Home\Controller.test', //callable
    //'controller' => 'home\controller', //callable
    //'controller' => 'blog2->home',
    'children' => [
        'blog' => [
            'route'      => 'blog',
            'controller' => 'blog->controller.test', //specific method
            //'hostname' => 'localhost', // "//localhost/blog" (when no scheme specified, inc parent)
            //'port' => '8080', // "http://localhost:8080/blog"
            'children' => [
                'remove' => [
                    'route' => '/remove',
                    'method' => ['GET', 'POST'],
                    //'scheme' => 'https',
                    //'hostname' => 'localhost',
                    //'controller' => 'blog:remove', //call event
                    'action' => [
                        'GET' => 'blog:remove',
                        'POST' => function(Request $request, Session $session, Url $url, callable $next = null) {
                            $session['success_message'] = 'Success';
                            return !$next ? new Redirect($url()) : $next($request, new Redirect($url()));
                        }
                    ]
                ],
                'create' => [
                    'route'      => '/:author[/:category]',
                    'defaults'   => [
                        'author'   => 'owner',
                        'category' => 'web'
                    ],
                    'wildcard'   => true,
                    'controller' => 'blog:add', //call event
                    //'controller' => 'blog2->add',
                    //'controller'  => function($request) { //named args
                        //var_dump($request->getPathInfo());
                    //},
                    'constraints' => [
                        'author'   => '[a-zA-Z0-9_-]*',
                        'category' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
        ],
        'app' => [
            'options'     => ['prefix' => '', 'suffix' => '\Controller', 'split' => '\\', 'separators' => ['-' => '\\', '_' => '_']],
            'route'       => ':controller[/:action]',
            'constraints' => ['controller' => '[a-zA-Z0-9_-]+', 'action' => '[a-zA-Z0-9_-]+'],
            'paramMap'    => ['param1' => 'controller', 'param2' => 'action'],
            'wildcard'   => true,
        ]
    ]
];
