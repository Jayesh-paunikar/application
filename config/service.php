<?php
/**
 *
 */

use Framework\Service\Config\Config;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Service\Service;

return array_replace(
    include __DIR__ . '/../vendor/mvc5/framework/config/service.php',
    [
        'Form' => new Config([
            'calls' => [
                'setViewManager' => new Dependency('View\Manager'),
            ]
        ]),
        'Home' => new Hydrator(
            Home\Controller::class,
            [
                'setModel' => new Service('View\Model', ['home'])
            ]
        ),
        'Request' => new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),
        /*'Request'  => function() {
            //var_dump($this->call('time'));
            return new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER);
        },*/
        'Response' => Response\HttpResponse::class,
    ]
);
