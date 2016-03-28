<?php
/**
 *
 */

return [
    'name'       => 'home', //for the url plugin in view templates
    'route'      => '/',
    'controller' => 'Home\Controller', //callable
    //'controller' => 'Home\Middleware',
    //'method' => 'POST',
    //'controller' => '@Home\Controller.test', //callable
    //'controller' => 'home\controller', //callable
    //'controller' => 'blog2->home',
    'children' => [
        'blog' => [
            'route'      => 'blog',
            'controller' => 'blog->controller.test', //specific method
            //'controller' => 'blog->middleware',
            'children' => [
                'remove' => [
                    'route' => '/remove',
                    'method' => ['GET', 'POST'],
                    //'scheme' => ['https'],
                    //'hostname' => ['localhost'],
                    //'controller' => 'blog:remove', //call event
                    'action' => [
                        'GET' => 'blog:remove',
                        //'GET' => 'Blog\Remove\Middleware',
                        'POST' => function($layout, $url) {
                            return new Response\RedirectResponse($url(), 201);

                            //$layout->model('<h1>Success</h1>');

                            //return $layout;
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
                    //'controller' => 'Blog\Add\Middleware',
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
        ]
    ]
];
