<?php

namespace Home;

use Framework\View\Model\ServiceTrait as View;

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
        var_dump(__FUNCTION__.':'.__FILE__,func_get_args());
    }

    /**
     * @return mixed
     */
    public static function staticTest()
    {
        var_dump(__FUNCTION__.':'.__FILE__,func_get_args());

        $viewManager = null; //error - no di

        $vm = new ViewModel;
        $vm->setTemplate(__DIR__ . '/../../view/home/index.phtml');
        //$vm->setViewManager($viewManager);

        $vm->args = func_get_args();

        return $vm;
    }

    /**
     * @return mixed
     */
    public function test()
    {
        $vm = $this->viewModel();

        $vm->args = func_get_args();

        $vm->args[] = __FUNCTION__;

        return $vm;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $vm = $this->viewModel();

        $vm->args = func_get_args() ? : null;

        return $vm;
    }
}
