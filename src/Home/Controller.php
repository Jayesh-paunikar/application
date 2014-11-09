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
        $model = new Model;
        $model->setTemplate($vm->param('templates.home'));
        $model->setViewManager($vm);

        $model->args = $args;

        $model->args[] = __FUNCTION__;

        return $model;
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param HomeModel $model
     * @param array $args
     * @return HomeModel
     */
    public function test(Response $response, Request $request, HomeModel $model = null, array $args = [])
    {
        $model = $this->model();

        $model->args = $args;

        $model->args[] = __FUNCTION__;

        return $model;
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param HomeModel $model
     * @param $pathinfo
     * @param array $args
     * @return HomeModel
     */
    public function __invoke(Response $response, Request $request, HomeModel $model = null, $pathinfo, array $args = [])
    {
        $vm = $this->model();

        $vm->args = $args;

        $vm->args[] = __FUNCTION__;

        $vm->args[] = $pathinfo;

        return $vm;
    }
}
