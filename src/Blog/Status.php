<?php
/**
 *
 */

namespace Blog;

use Mvc5\Response\Json;

class Status
{
    /**
     * @return Model
     */
    function __invoke()
    {
        return new Json(['PHP' => phpversion(), 'System' => php_uname()]);
    }
}
