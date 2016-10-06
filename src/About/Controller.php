<?php
/**
 *
 */
namespace About;

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
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            echo $this->message;
        };
    }
}
