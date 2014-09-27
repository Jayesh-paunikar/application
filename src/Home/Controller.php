<?php

namespace Home;

use Framework\View\Model\ServiceTrait as ViewModel;

class Controller
    implements ControllerInterface
{
    /**
     *
     */
    use ViewModel;

    /**
     * @return mixed
     */
    public function test()
    {
        $vm = $this->viewModel();

        $vm->args = func_get_args();

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
