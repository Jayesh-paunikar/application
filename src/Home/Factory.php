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
     * @param ViewManager $vm
     * @return Controller
     */
    public function __invoke(Config $config, ViewManager $vm)
    {
        $m = new ViewModel;
        $m->setTemplate($this->param('view.templates.home'));
        $m->setViewManager($vm);

        $controller = new Controller;
        $controller->setViewModel($m);

        return $controller;
    }
}
