<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Arg;
use Mvc5\Model\Layout as LayoutModel;
use Mvc5\Model\ViewModel;
use Request\Psr\Request;
use Response\Psr\Response;

class Layout
{
    /**
     * @var LayoutModel
     */
    protected $layout;

    /**
     * @param LayoutModel $layout
     */
    function __construct(LayoutModel $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return mixed
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        $model = $request->getAttribute(Arg::MODEL);

        if (!$model || !$model instanceof ViewModel || $model instanceof LayoutModel) {
            return $next($request, $response);
        }

        $this->layout->model($model);

        $request = $request->withAttribute(Arg::MODEL, $this->layout);

        return $next($request, $response);
    }
}
