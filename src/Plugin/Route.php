<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\Args;
use Mvc5\Plugin\Call;
use Mvc5\Plugin\Config\Plugin;

class Route
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
    public function __construct($name, array $args = [], array $calls = [])
    {
        $this->config = [
            Arg::ARGS  => $args ?: [new Args([
                    'hostname' => new Call('request.getHost'),
                    'method'   => new Call('request.getMethod'),
                    'path'     => new Call('request.getPathInfo'),
                    'scheme'   => new Call('request.getScheme')
            ])],
            Arg::CALLS => $calls,
            Arg::NAME  => $name
        ];
    }
}
