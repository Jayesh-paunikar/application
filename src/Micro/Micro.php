<?php

namespace Micro;

use Exception;
use Framework\Application\App;
use Framework\Config\Config;
use Framework\Route\Definition\Builder\Builder;
use Framework\Route\Definition\Definition;
use Framework\Service\Factory\Base;
use Framework\Service\Config\Router\Router;

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
     * @param Definition $parent
     * @param Definition $definition
     * @param $path
     * @throws Exception
     */
    protected function addRoute(Definition $parent, Definition $definition, $path)
    {
        $paths = explode('/', $path, 2);

        $root = $parent->child($paths[0]);

        if (!$root) {
            if (isset($paths[1])) {
                throw new Exception('Parent definition not found2: ' . $paths[1]);
            }

            $parent->add($paths[0], $definition);

            return;
        }

        $this->addRoute($root, $definition, $paths[1]);
    }

    /**
     * @param string $name
     * @param string $route
     * @param callable|string $controller
     * @throws Exception
     */
    public function route($name, $route, $controller)
    {
        /**
         * @var Definition $definitions
         * @var \Framework\Event\Config\Configuration $events
         */

        $definition = Builder::definition([
            self::NAME       => $name,
            self::ROUTE      => $route,
            self::CONTROLLER => $controller
        ]);

        $routes      = $this->param(self::ROUTES);
        $definitions = $routes[self::DEFINITIONS];
        $events      = $routes[self::EVENTS];

        $paths = explode('/', $name, 2);

        $root = $definitions->child($paths[0]);

        if (!$root) {
            if (isset($paths[1])) {
                throw new Exception('Parent definition not found: ' . $paths[1]);
            } else {
                $definitions->add($paths[0], $definition);
                $events->add(self::ROUTE_DISPATCH, new Router($definition));
            }

            return;
        }

        $this->addRoute($definitions, $definition, $name);
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
