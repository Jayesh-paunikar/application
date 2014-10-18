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
    'web' => [
        ['Web\Route'],
        //[function($vm) { var_dump($vm); }],
        ['Web\Dispatch'],
        ['Web\Layout'],
        ['Web\Render'],
        ['Web\Response']
    ],
];
