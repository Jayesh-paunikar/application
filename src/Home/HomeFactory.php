<?php

namespace Home;

use Mvc5\Config\Configuration;
use Mvc5\View\Manager\ViewManager;

interface HomeFactory
{
    /**
     * @param Configuration $config
     * @param ViewManager $vm
     * @return Controller
     */
    function __invoke(Configuration $config, ViewManager $vm);
}
