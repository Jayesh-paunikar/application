<?php
/**
 *
 */

namespace Home;

use Mvc5\Arg;
use Mvc5\View\Model as ViewModel;
use Request\Psr\Request;
use Response\Psr\Response;
use Server\Server;

class Middleware
{
    /**
     *
     */
    use ViewModel;

    /**
     * @var
     */
    protected $server;

    /**
     * @param Model $model
     * @param Server $server
     */
    function __construct(Model $model, Server $server)
    {
        $this->model  = $model;
        $this->server = $server;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        $request = $request->withAttribute(Arg::MODEL, $this->model(['server' => $this->server]));

        return $next($request, $response);
    }
}
