<?php
/**
 *
 */

namespace Home;

use Mvc5\View\Model as ViewModel;
use Request;
use Response;

class Controller
{
    /**
     *
     */
    use ViewModel;

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
     * @return Model
     */
    function __invoke(Request $request, Response $response)
    {
        return $this->model(['request' => $request]);
    }
}
