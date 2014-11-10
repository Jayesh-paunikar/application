<?php

namespace Home;

use ArrayAccess;
use Framework\View\Model\Base;
use Framework\View\ViewPlugin;
use Framework\View\Model\ViewModel;
use Framework\View\Model\Plugin;

class Model
    implements ArrayAccess, HomeModel, Plugin, ViewModel
{
    /**
     *
     */
    use Base;
    use ViewPlugin;
}
