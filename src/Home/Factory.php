<?php

namespace Home;

use Mvc5\Config\Configuration;
use Mvc5\Service\Factory\Base;
use Mvc5\View\Manager\ViewManager;

class Factory
{
    /**
     *
     */
    use Base;

    /**
     * @param Configuration $config
     * @param ViewManager $vm
     * @return Controller
     */
    public function __invoke(Configuration $config, ViewManager $vm)
    {
        return new Controller(new Model('home'));
    }
}
