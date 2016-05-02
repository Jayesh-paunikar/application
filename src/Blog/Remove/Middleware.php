<?php
/**
 *
 */

namespace Blog\Remove;

use Mvc5\Arg;
use Mvc5\Model\ViewLayout;
use Request\Psr\Request;
use Response\Psr\Response;

class Middleware
{
    /**
     * @var ViewLayout
     */
    protected $layout;

    /**
     * @param ViewLayout $layout
     */
    function __construct(ViewLayout $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        $this->layout->model('<h1>Demo Middleware Action</h1>');

        $request = $request->withAttribute(Arg::MODEL, $this->layout);

        return $next($request, $response);
    }
}
