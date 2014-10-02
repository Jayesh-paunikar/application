<?php
/**
 *
 */

//demo calling specific service methods
return [
    'Controller\Exception\Event' => [
        ['Controller\Exception\Listener'],
    ],
    'Dispatch\Event' => [
        ['@Dispatch\Listener.__invoke']
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
