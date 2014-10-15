<?php

namespace Home;

use Framework\Config\ConfigInterface as Config;
use Framework\View\Manager\ManagerInterface as ViewManager;

interface FactoryInterface
{
    /**
     * @param Config $config
     * @param ViewManager $viewManager
     * @return Controller
     */
    function __invoke(Config $config, ViewManager $viewManager);
}
