<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Arg;
use Mvc5\Plugin;
use Request\Psr\Request;
use Response\Psr\Response;

class Controller
{
    /**
     *
     */
    use Plugin;

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return callable|mixed|null|object
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $controller = $request->getAttribute(Arg::ROUTE)->controller();

        return $this->call($controller, [$request, $response, $next]);
    }
}
