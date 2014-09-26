<?php
/**
 *
 */

return [
    'Mvc\Event' => [
        ['Mvc\Route'],
        [
            //demo dump route params
            function($event) {
                //var_dump($event->route()->params());
            }
        ],
        ['Mvc\Dispatch'],
        ['Mvc\Layout'],
        ['Mvc\Render'],
        ['Mvc\Response']
    ],
    'Response\Event' => [
        ['Response\Listener']
        /*[function($event) {
            return $event->response();
        }]*/
    ],
    'View\Exception\Event' => [
        ['View\Exception\Listener'],
    ],
    'View\Render\Event' => [
        ['View\Render'],
    ],
];
