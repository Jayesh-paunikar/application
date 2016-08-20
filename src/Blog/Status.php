<?php
/**
 *
 */

namespace Blog;

use Mvc5\Response\Json;
use Mvc5\Response\Response;

class Status
{
    /**
     * @return Response
     */
    function __invoke()
    {
        return new Json(['PHP' => phpversion(), 'System' => php_uname()]);
    }
}
