<?php
/**
 *
 */

namespace Home;

use Mvc5\Arg;
use Mvc5\View\Model as ViewModel;
use Request\Psr\Request;
use Response\Psr\Response;

class Middleware
{
    /**
     *
     */
    use ViewModel;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $request = $request->withAttribute(Arg::MODEL, $this->model(['args' => [__FUNCTION__]]));

        return $next($request, $response);
    }
}
