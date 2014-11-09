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
    'Controller\Dispatch' => [
        ['Controller\Dispatcher']
    ],
    'Controller\Exception' => [
        ['Controller\Exception\Controller'],
    ],
    'Exception\View' => [
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
        ['Response\Sender'],
        /*[function($response) {
            var_dump($response);
        }]*/
    ],
    'Response\Exception' => [
        ['Response\Exception\Dispatch'],
        ['Response\Exception\Renderer'],
    ],
    'View\Render' => [
        ['View\Renderer'],
    ],
];
