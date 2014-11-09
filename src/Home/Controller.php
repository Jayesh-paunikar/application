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
        $model = new Model($vm->param('templates.home'));
        $model->setViewManager($vm);

        $args['args'][] = __FUNCTION__;

        $model->vars($args);

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
        return $this->view(null, $args + ['args' => [__FUNCTION__]]);
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
        return $this->view(null, $args + ['args' => [__FUNCTION__, $pathinfo]]);
    }
}
