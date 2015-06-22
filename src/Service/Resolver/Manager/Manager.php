<?php
/**
 *
 */

namespace Service\Resolver\Manager;

use Mvc5\Service\Resolver\Resolvable;

interface Manager
{
    /**
     * @param Resolvable $service
     * @param array|callable|null|object|string
     */
    function __invoke(Resolvable $service);
}
