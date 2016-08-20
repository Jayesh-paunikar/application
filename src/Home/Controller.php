<?php
/**
 *
 */

namespace Home;

use Mvc5\Model\ViewModel;
use Mvc5\View\Model as _ViewModel;
use Request;
use Response;

class Controller
{
    /**
     *
     */
    use _ViewModel;

    /**
     * @param Model $model
     */
    function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return ViewModel
     */
    function __invoke(Request $request, Response $response)
    {
        return $this->model(['request' => $request]);
    }
}
