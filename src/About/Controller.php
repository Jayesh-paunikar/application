<?php
/**
 *
 */
namespace About;

use Mvc5\Arg;
use Mvc5\Response\Emitter\Callback;
use Response;

class Controller
{
    function __invoke(Response $response)
    {
        $response[Arg::BODY] = new Callback(function() {
            echo 'Mvc5 Demo Application';
        });

        return $response;
    }
}
