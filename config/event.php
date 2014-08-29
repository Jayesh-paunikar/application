<?php
/**
 *
 */

return [
    'Mvc\Event' => [
        ['Mvc\Route'],
        ['Mvc\Dispatch'],
        ['Mvc\Layout'],
        ['Mvc\Render'],
        ['Mvc\Response'],
        ['Mvc\SendResponse']
    ],
    'Response\Event' => [
        /*[function($event) {
            var_dump(__FILE__, $event);
        }]*/
    ],
    'Response\Send\Event' => [
        ['Response\Send\Http']
    ],
    'View\Exception\Event' => [
        ['View\Exception\Listener'],
    ],
    'View\Render\Event' => [
        ['View\Render'],
    ],
];
