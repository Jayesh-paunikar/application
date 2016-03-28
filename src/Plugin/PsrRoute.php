<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Config\Plugin;
use Mvc5\Route\Config as RouteConfig;

class PsrRoute
    implements Gem\Route
{
    /**
     *
     */
    use Plugin;

    /**
     * @param string $name
     * @param array $args
     * @param array $calls
     */
    public function __construct($name = null, array $args = [], array $calls = [])
    {
        $this->config = [
            Arg::ARGS  => $args ?: [new Args([
                'hostname' => new Call('request.getUri.getHost'),
                'method'   => new Call('request.getMethod'),
                'path'     => new Call('request.getUri.getPath'),
                'scheme'   => new Call('request.getUri.getScheme')
            ])],
            Arg::CALLS => $calls,
            Arg::NAME  => $name ?? RouteConfig::class
        ];
    }
}
