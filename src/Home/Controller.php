<?php

namespace Home;

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
     * @return mixed
     */
    public static function staticTest(array $args = [])
    {
        var_dump(__FUNCTION__.':'.__FILE__, $args);

        $viewManager = null; //error - no di

        $vm = new ViewModel;
        $vm->setTemplate(__DIR__ . '/../../view/home/index.phtml');
        //$vm->setViewManager($viewManager);

        $vm->args = $args;

        $vm->args[] = __FUNCTION__;

        return $vm;
    }

    /**
     * @param Response $response
     * @param Request $request
     * @param ViewModelInterface $viewModel
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
