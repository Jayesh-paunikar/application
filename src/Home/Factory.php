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
        $model = new Model;
        $model->setTemplate($this->param('templates.home'));
        $model->setViewManager($vm);

        $controller = new Controller;
        $controller->setModel($model);

        return $controller;
    }
}
