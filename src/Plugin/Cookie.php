<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Cookie\Config;
use Mvc5\Cookie\Sender;
use Mvc5\Plugin\Dependency;

class Cookie
    extends Dependency
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct('cookies', [Config::class, new Sender, $_COOKIE]);
    }
}
