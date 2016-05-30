<?php
/**
 *
 */

namespace Plugin;

use Mvc5\App;
use Mvc5\Arg;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Plugins;
use Mvc5\Plugin\Scope;
use Mvc5\Resolvable;
use Request\Config as RequestConfig;
use Symfony\Component\HttpFoundation\ApacheRequest;

class Request
    extends Scope
{
    /**
     * @param array|Resolvable $plugins
     * @param array $extra
     */
    function __construct($plugins, array $extra = [])
    {
        parent::__construct(
            RequestConfig::class,
            new Plugin(App::class, [new Args([Arg::SERVICES => $plugins]), new Plugins($extra, null), true, true]),
            new ApacheRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER)
        );
    }
}
