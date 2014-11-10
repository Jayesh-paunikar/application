<?php

namespace Home;

use Framework\View\Manager\ViewManager;
use Framework\View\Model\Service\ViewModel;
use Request\Request;
use Response\Response;

class Controller
    implements Home
{
    /**
     *
     */
    use ViewModel;

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

        $model = new Model($vm->param('templates.home'), $args);
        $model->setViewManager($vm);

        return $model;
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param array $args
     * @return HomeModel
     */
    public function test(Response $response, Request $request, array $args = [])
    {
        return $this->view('../view/home/index.phtml', $args + ['args' => [__FUNCTION__]]);
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param $pathinfo
     * @param array $args
     * @return HomeModel
     */
    public function __invoke(Response $response, Request $request, $pathinfo, array $args = [])
    {
        return $this->model($args + ['args' => [__FUNCTION__, $pathinfo]]);
    }
}
