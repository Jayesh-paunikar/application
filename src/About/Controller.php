<?php
/**
 *
 */
namespace About;

use Response;

class Controller
{
    /**
     * @param Response $response
     * @return Response
     */
    function __invoke(Response $response)
    {
        $response->body(function() {
            echo 'Mvc5 Demo Application';
        });

        return $response;
    }
}
