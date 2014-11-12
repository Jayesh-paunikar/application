<?php

namespace Home;

use Framework\Config\Configuration;
use Framework\Service\Factory\Base;
use Framework\View\Manager\ViewManager;
use Framework\View\Model\Model;

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
        $controller = new Controller;
        $controller->setModel(new Model('home'));

        return $controller;
    }
}
