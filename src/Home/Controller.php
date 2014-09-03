<?php

namespace Application\Home;

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
    public function __invoke()
    {
        return $this->viewModel();
    }
}
