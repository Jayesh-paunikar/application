<?php

namespace Home;

use Mvc5\Service\Factory\Base;
use Mvc5\View\Manager\ViewManager;

class Factory
{
    /**
     *
     */
    use Base;

    /**
     * @param array $config
     * @param ViewManager $vm
     * @return Controller
     */
    public function __invoke(array $config, ViewManager $vm)
    {
        return new Controller(new Model('home'));
    }
}
