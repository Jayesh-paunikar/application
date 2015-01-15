<?php
/**
 *
 */

use Framework\Service\Config\Factory\Factory;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Service\Service;
use Framework\View\Model\Model;
use Framework\View\Model\ViewModel;

return [
    /*'Home' => new Service(
        Home\Controller::class,[]
        //[new Service(Home\Model::class,['home'])],
        //['setModel' => new Service('Home\Model', ['home'])]
    ),*/

    //'Home\Model' => new Service(Home\Model::class,['home']),

    //'Home' => new Factory(Home\Factory::class),

    'Request' => new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),

    'Response' => Response\HttpResponse::class,
    'Response\Response' => 'Response',

    ViewModel::class => Model::class

] + include __DIR__ . '/../vendor/mvc5/framework/config/service.php';
