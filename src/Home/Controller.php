<?php

namespace Home;

use Framework\View\Manager\ManagerInterface as ViewManager;
use Framework\View\Model\ServiceTrait as View;
use Framework\Request\RequestInterface as Request;
use Framework\Response\ResponseInterface as Response;

class Controller
    implements ControllerInterface
{
    /**
     *
     */
    use View;

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
     * @param ViewModelInterface $viewModel
     * @param array $args
     * @return ViewModelInterface
     */
    public function test(Response $response, Request $request, ViewModelInterface $viewModel = null, array $args = [])
    {
        $vm = $this->viewModel();

        $vm->args = $args;

        $vm->args[] = __FUNCTION__;

        return $vm;
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param ViewModelInterface $viewModel
     * @param array $args
     * @return ViewModelInterface
     */
    public function __invoke(Response $response, Request $request, ViewModelInterface $viewModel = null, array $args = [])
    {
        $vm = $this->viewModel();

        $vm->args = $args;

        $vm->args[] = __FUNCTION__;

        return $vm;
    }
}
