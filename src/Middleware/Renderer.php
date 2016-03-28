<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Arg;
use Mvc5\Plugin;
use Request\Psr\Request;
use Response\Psr\Response;

class Renderer
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
        $model = $request->getAttribute(Arg::MODEL);

        $body = $this->call(Arg::VIEW_RENDER, [Arg::MODEL => $model]);

        $response = $response->setContent($body);

        return $next($request, $response);
    }
}
