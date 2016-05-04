<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Plugin\End;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Dependency;
use Mvc5\Plugin\Plugin;
use Session\Config as SessionConfig;
use Session\Container as SessionContainer;

class Session
    extends Dependency
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct('session', new End(
            new Call('@session_start'), new Plugin(SessionContainer::class, [new Plugin(SessionConfig::class)])
        ));
    }
}
