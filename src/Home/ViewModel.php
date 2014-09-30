<?php

namespace Home;

use Framework\View\Model\ModelTrait;
use Framework\View\Plugin\PluginTrait;
use Framework\View\Model\ModelInterface;

class ViewModel
    implements ModelInterface, ViewModelInterface
{
    /**
     *
     */
    use ModelTrait;
    use PluginTrait;
}
