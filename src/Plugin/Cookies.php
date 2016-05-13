<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Cookie\Config;
use Mvc5\Cookie\Sender;
use Mvc5\Plugin\Dependency;

class Cookies
    extends Dependency
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct(Arg::COOKIES, [Config::class, new Sender, $_COOKIE]);
    }
}
