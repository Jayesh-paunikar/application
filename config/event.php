<?php
/**
 *
 */

return [
    'Dispatch\Event' => [
        ['Dispatch\Listener']
    ],
    'Controller\Exception' => [
        ['Controller\Exception\Listener'],
    ],
    'Controller\Error' => [
        ['Controller\Error\Listener'],
    ],
    'Mvc\Event' => [
        ['Mvc\Route'],
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
