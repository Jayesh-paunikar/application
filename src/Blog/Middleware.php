<?php
/**
 *
 */

namespace Blog;

use Mvc5\Arg;
use Request\Psr\Request;
use Response\Psr\Response;

class Middleware
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var string
     */
    protected $template;

    /**
     * @param Model $model
     * @param $template
     */
    function __construct(Model $model, $template)
    {
        $this->model    = $model;
        $this->template = $template;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        $this->model->template($this->template);

        $request = $request->withAttribute(Arg::MODEL, $this->model);

        return $next($request, $response);
    }
}
