<?php

namespace Home;

use Mvc5\View\ViewModel as View;
use Mvc5\View\Model\ViewModel;
use Request\Request;
use Response\Response;

class Controller
    implements Home
{
    /**
     *
     */
    use View;

    /**
     * @param ViewModel $model
     */
    public function __construct(ViewModel $model)
    {
        $this->model = $model;
        $model && !$model->path() && $model->template('home');
    }

    /**
     * @param Response $hint
     * @param Request $request
     * @param array $args
     * @return ViewModel
     */
    public function __invoke(Response $hint, Request $request, array $args = [])
    {
        return $this->model($args + ['args' => [__FUNCTION__]]);
    }
}
