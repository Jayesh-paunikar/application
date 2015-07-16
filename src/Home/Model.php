<?php

namespace Home;

use Mvc5\View\Model\Base;
use Mvc5\View\Model\Plugin;
use Mvc5\View\Model\ViewModel;
use Mvc5\View\ViewPlugin;

class Model
    implements Plugin, ViewModel
{
    /**
     *
     */
    use Base;
    use ViewPlugin;

    /**
     *
     */
    const TEMPLATE_NAME = 'home';
}
