<?php

namespace Home;

use Mvc5\View\ViewModel as View;
use Request\Request;
use Response\Response;

class Controller
{
    /**
     *
     */
    use View;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param Response $hint
     * @param Request $request
     * @param array $args
     * @return Model
     */
    public function __invoke(Response $hint, Request $request, array $args = [])
    {
        return $this->model(['args' => [__FUNCTION__]] + $args);
    }
}
