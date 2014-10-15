<?php

namespace Home;

use Framework\Config\ConfigInterface as Config;
use Framework\Service\FactoryTrait;
use Framework\View\Manager\ManagerInterface as ViewManager;

class Factory
    implements FactoryInterface
{
    /**
     *
     */
    use FactoryTrait;

    /**
     * @param Config $config
     * @param ViewManager $viewManager
     * @return Controller
     */
    public function __invoke(Config $config, ViewManager $viewManager)
    {
        $vm = new ViewModel;
        $vm->setTemplate($config->get('view')['templates']['home']); //nicer if had $this->param()
        $vm->setViewManager($viewManager);

        $controller = new Controller;
        $controller->setViewModel($vm);

        return $controller;
    }
}
