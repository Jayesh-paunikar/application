<?php

namespace Home;

use Framework\Config\Configuration;
use Framework\Service\FactoryTrait;
use Framework\View\Manager\ViewManager;

class Factory
    implements HomeFactory
{
    /**
     *
     */
    use FactoryTrait;

    /**
     * @param Configuration $config
     * @param ViewManager $vm
     * @return Controller
     */
    public function __invoke(Configuration $config, ViewManager $vm)
    {
        $m = new ViewModel;
        $m->setTemplate($this->param('view.templates.home'));
        $m->setViewManager($vm);

        $controller = new Controller;
        $controller->setViewModel($m);

        return $controller;
    }
}
