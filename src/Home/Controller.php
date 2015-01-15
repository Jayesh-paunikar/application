<?php

namespace Home;

use Framework\View\Manager\ViewManager;
use Framework\View\ViewModel as View;
use Framework\View\Model\ViewModel;
//use Framework\View\Model\Model;
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
     * @return mixed
     */
    public static function staticCall()
    {
        var_dump(__FUNCTION__.':'.__FILE__, func_get_args());
    }

    /**
     * @param ViewManager $vm
     * @param array $args
     * @return mixed
     */
    public static function staticTest(ViewManager $vm, array $args = [])
    {
        $args['args'][] = __FUNCTION__;

        return new Model('home', $args);
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param array $args
     * @return ViewModel
     */
    public function test(Response $response, Request $request, array $args = [])
    {
        return $this->view('../view/home/index.phtml', $args + ['args' => [__FUNCTION__]]);
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
