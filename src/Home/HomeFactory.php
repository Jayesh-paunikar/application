<?php

namespace Home;

use Framework\Config\Configuration;
use Framework\View\Manager\ViewManager;

interface HomeFactory
{
    /**
     * @param Configuration $config
     * @param ViewManager $vm
     * @return Controller
     */
    function __invoke(Configuration $config, ViewManager $vm);
}
