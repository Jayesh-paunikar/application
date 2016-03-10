<?php
/**
 *
 */

namespace Home;

use Mvc5\View\Model as ViewModel;
use Request\Request;
use Response\Response;

class Controller
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
     * @param Model $model
     */
    public static function test(Model $model)
    {
        var_dump($model);exit;
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param array $args
     * @return Model
     */
    public function __invoke(Response $response, Request $request, array $args = [])
    {
        return $this->model(['args' => [__FUNCTION__]] + $args);
    }
}
