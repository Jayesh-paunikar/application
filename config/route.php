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
                    'route'      => '/:author[/:category[/:wildcard]]',
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
                        'author'   => '[a-zA-Z0-9_-]+',
                        'category' => '[a-zA-Z0-9_-]+',
                        'wildcard' => '[a-zA-Z0-9/]+[a-zA-Z0-9]$'
                    ]
                ]
            ],
        ],
        'app' => [
            'options'     => ['separators' => ['_' => '_', '-' => '\\']],
            'constraints' => ['controller' => '[a-zA-Z][a-zA-Z0-9]+', 'action' => '[a-zA-Z0-9_-]+', 'wildcard' => '[a-zA-Z0-9/]+[a-zA-Z0-9]$'],
            'name'        => 'app',
            'route'       => ':controller[/:action[/:wildcard]]',
            'wildcard'    => true
        ]
    ]
];
