<?php
/**
 *
 */
namespace About;

use Response;

class Controller
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $message
     */
    function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @param Response $response
     * @return Response
     */
    function __invoke(Response $response)
    {
        $response->body(function() {
            echo $this->message;
        });

        return $response;
    }
}
