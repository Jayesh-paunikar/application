<?php
/**
 *
 */

use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Service\Service;

return [
    'Home' => new Hydrator(
        Home\Controller::class,
        ['setModel' => new Service('View\Model', ['home'])]
    ),

    'Request' => new Request\HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER),

    'Response' => Response\HttpResponse::class,

] + include __DIR__ . '/../vendor/mvc5/framework/config/service.php';
