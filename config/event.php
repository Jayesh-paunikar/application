<?php
/**
 *
 */

//demo calling specific service methods
return [
    'blog:create' => [
        [
            '@Blog\Controller.valid',
            '@Blog\Controller.add',
            '@Blog\Controller.response'
        ]
    ],
    'Controller\Action' => [
        ['Controller\Dispatcher']
    ],
    'Exception\Dispatch' => [
        ['Exception\Dispatcher'],
    ],
    'Exception\Render' => [
        ['Exception\Renderer'],
    ],
    'Mvc' => [
        ['Mvc\Route'],
        ['Mvc\Controller'],
        ['Mvc\Layout'],
        ['Mvc\View'],
        ['Mvc\Response']
    ],
    'Response\Dispatch' => [
        ['Response\Dispatcher'],
        /*[function($response) {
            var_dump($response);
        }]*/
    ],
    'View\Render' => [
        ['View\Renderer'],
    ],
];
