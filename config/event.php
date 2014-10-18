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
    'Controller\Exception\Event' => [
        ['Controller\Exception\Listener'],
    ],
    'Dispatch\Event' => [
        ['Dispatch\Listener']
    ],
    'Mvc\Event' => [
        ['Mvc\Route'],
        //[function($vm) { var_dump($vm); }],
        ['Mvc\Dispatch'],
        ['Mvc\Layout'],
        ['Mvc\Render'],
        ['Mvc\Response']
    ],
    'Response\Event' => [
        ['Response\Listener'],
        /**[function($response) {
            var_dump($response);
        }]*/
    ],
    'View\Exception\Event' => [
        ['View\Exception\Listener'],
    ],
    'View\Render\Event' => [
        ['View\Render'],
    ],
];
