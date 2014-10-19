<?php
/**
 *
 */

//demo calling specific service methods
return [
    'CreateBlog' => [
        [
            '@Blog\Controller.valid',
            '@Blog\Controller.add',
            '@Blog\Controller.response'
        ]
    ],
    'Exception\Dispatch' => [
        ['Exception\Dispatcher'],
    ],
    'Controller\Dispatch' => [
        ['Controller\Dispatcher']
    ],
    'Mvc' => [
        ['Mvc\Route'],
        ['Mvc\Dispatch'],
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
    'Exception\Render' => [
        ['Exception\Renderer'],
    ],
    'View\Render' => [
        ['View\Renderer'],
    ],
];
