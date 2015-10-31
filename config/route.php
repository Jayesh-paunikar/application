<?php
/**
 *
 */

return [
    'name'       => 'home', //for the url plugin in view templates
    'route'      => '/',
    'controller' => 'Home\Controller', //callable
    //'controller' => 'Blog2->Home',
    'children' => [
        'blog' => [
            'route'      => 'blog',
            'controller' => '@Blog->Controller.test', //specific method
            'children' => [
                'remove' => [
                    'route' => '/remove',
                    'controller' => '@blog:remove' //call event
                ],
                'create' => [
                    'route'      => '/:author[/:category]',
                    'defaults'   => [
                        'author'   => 'owner',
                        'category' => 'web'
                    ],
                    'wildcard'   => false,
                    'controller' => '@blog:create', //call event
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
