<?php
/**
 *
 */

namespace Home;

use Mvc5\View\Model as ViewModel;
use Request\Request;
use Response\Response;
use Server\Server;

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
     * @param Server $server
     * @return Model
     */
    public function __invoke(Response $response, Request $request, Server $server)
    {
        return $this->model(['server' => $server]);
    }
}
