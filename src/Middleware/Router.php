<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Arg;
use Mvc5\Signal;
use Mvc5\Route\Route;
use Request\Psr\Request;
use Response\Psr\Response;
use RuntimeException;

class Router
{
    /**
     *
     */
    use Signal;

    /**
     * @var callable
     */
    protected $router;

    /**
     * @param callable
     */
    function __construct(callable $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return mixed
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        $result = $this->signal($this->router);

        if ($result instanceof Route) {
            $request = $request->withAttribute(Arg::ROUTE, $result);

            return $next($request, $response);
        }

        if ($result instanceof Response) {
            return $result;
        }

        throw new RuntimeException('Invalid route response');
    }
}
