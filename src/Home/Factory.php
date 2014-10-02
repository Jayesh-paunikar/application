<?php

namespace Home;

use Framework\Service\Factory\Factory as Base;

class Factory
    extends Base
{
    /**
     * @return Controller
     */
    public function __invoke()
    {
        /**
         * @var \Framework\View\Manager\ManagerInterface $viewManager
         * @var \Framework\Config\ConfigInterface $config
         */

        $config      = $this->config();
        $viewManager = $this->get('View\Manager');

        $vm = new ViewModel;
        $vm->setTemplate($config->get('view')['templates']->home); //nicer if had $this->param()
        $vm->setViewManager($viewManager);

        $controller = new Controller;
        $controller->setViewModel($vm);

        return $controller;
    }
}
