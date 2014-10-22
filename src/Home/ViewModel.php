<?php

namespace Home;

use Framework\View\Model\ModelTrait;
use Framework\View\PluginTrait;
use Framework\View\Model\ViewModel as Base;

class ViewModel
    implements Base, HomeViewModel
{
    /**
     *
     */
    use ModelTrait;
    use PluginTrait;
}
