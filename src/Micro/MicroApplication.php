<?php

namespace Micro;

interface MicroApplication
{
    /**
     *
     */
    const CONTROLLER = 'controller';

    /**
     *
     */
    const DEFINITIONS = 'definitions';

    /**
     *
     */
    const EVENTS = 'events';

    /**
     *
     */
    const MICRO = 'micro';

    /**
     *
     */
    const NAME = 'name';

    /**
     *
     */
    const ROUTE = 'route';

    /**
     *
     */
    const ROUTE_DISPATCH = 'Route\Dispatch';

    /**
     *
     */
    const ROUTER = 'Router';

    /**
     *
     */
    const ROUTES = 'routes';

    /**
     * @param string $name
     * @param string $route
     * @param callable|string $controller
     */
    function route($name, $route, $controller);

    /**
     * @param array $args
     * @param callable $callback
     * @return callable|mixed|null|object
     */
    function __invoke(array $args = [], callable $callback = null);
}
