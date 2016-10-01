<?php
/**
 *
 */
namespace Status;

use Mvc5\Response\Json;
use Mvc5\Response\Response;

class Controller
{
    /**
     * @return Response
     */
    function __invoke()
    {
        return new Json(['PHP' => phpversion(), 'System' => php_uname()]);
    }
}
