<?php
/**
 *
 */

namespace Service;

use Plugin\Gem\Controller;
use Mvc5\Plugin\Gem\Plugin;
use Mvc5\Resolver\Resolver;
use Mvc5\Service\Manager;
use Mvc5\Resolvable;

class Provider
    implements Manager
{
    /**
     *
     */
    use Resolver;

    /**
     * @param $config
     * @param array $args
     * @return array|callable|Plugin|null|object|Resolvable|string
     * @throws \RuntimeException
     */
    protected function resolve($config, array $args = [])
    {
        return $this->resolvable($config, $args, function($config, array $args = []) {
            if ($config instanceof Controller) {
                return $this->make($config->config());
            }

            return null;
        });
    }
}
