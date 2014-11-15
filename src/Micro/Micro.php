<?php

namespace Micro;

use Framework\Application\App;
use Framework\Config\Config;
use Framework\Route\Definition\Builder\Builder;
use Framework\Service\Factory\Base;

class Micro
    implements MicroApplication
{
    /**
     *
     */
    use Base;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->sm = new App($config);
    }

    /**
     * @param string $name
     * @param string $route
     * @param callable|string $controller
     */
    public function route($name, $route, $controller)
    {
        $definition = Builder::definition([
            self::NAME       => $name,
            self::ROUTE      => $route,
            self::CONTROLLER => $controller
        ]);

        $routes      = $this->param(self::ROUTES);
        $definitions = $routes[self::DEFINITIONS];
        $events      = $routes[self::EVENTS];

        $definitions->set($name, $definition);

        $events->add(self::ROUTE_DISPATCH, $this->create(self::ROUTER, [$definition]));
    }

    /**
     * @param array $args
     * @param callable $callback
     * @return callable|mixed|null|object
     */
    public function __invoke(array $args = [], callable $callback = null)
    {
        return $this->sm->call(self::MICRO, $args, $callback);
    }
}
