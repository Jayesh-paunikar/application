<?php

namespace Home;

use Framework\View\Manager\ViewManager;
use Framework\View\Model\Service\ViewModel as Model;
use Request\Request;
use Response\Response;

class Controller
    implements HomeController
{
    /**
     *
     */
    use Model;

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
        $m = new ViewModel;
        $m->setTemplate($vm->param('view.templates.home'));
        $m->setViewManager($vm);

        $m->args = $args;

        $m->args[] = __FUNCTION__;

        return $m;
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param HomeViewModel $viewModel
     * @param array $args
     * @return HomeViewModel
     */
    public function test(Response $response, Request $request, HomeViewModel $viewModel = null, array $args = [])
    {
        $vm = $this->viewModel();

        $vm->args = $args;

        $vm->args[] = __FUNCTION__;

        return $vm;
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param HomeViewModel $viewModel
     * @param array $args
     * @return HomeViewModel
     */
    public function __invoke(Response $response, Request $request, HomeViewModel $viewModel = null, array $args = [])
    {
        $vm = $this->viewModel();

        $vm->args = $args;

        $vm->args[] = __FUNCTION__;

        return $vm;
    }
}
