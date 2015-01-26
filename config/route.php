<?php
/**
 *
 */

return [
    'name'       => 'home', //a name is required for the url plugin used in view templates
    'route'      => '/',
    'controller' => 'Home\Controller', //callable __invoke() method
    'children' => [
        'blog' => [
            'route'      => 'blog',
            'controller' => '@Blog\Controller\Respond.respond', //call specific function
            'children' => [
                'create' => [
                    'route'      => '/:author[/:category]',
                    'defaults'   => [
                        'author'   => 'owner',
                        'category' => 'web'
                    ],
                    'wildcard'   => false,
                    'controller' => '@blog:create',
                    'constraints' => [
                        'author'   => '[a-zA-Z0-9_-]*',
                        'category' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
        ]
    ]
];
