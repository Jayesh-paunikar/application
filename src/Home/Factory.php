<?php

namespace Home;

use Framework\Config\Configuration;
use Framework\Service\Factory\Base;
use Framework\View\Manager\ViewManager;

class Factory
    implements HomeFactory
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
