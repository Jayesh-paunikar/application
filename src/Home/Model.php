<?php

namespace Home;

use Framework\View\Model\Base;
use Framework\View\Model\Plugin;
use Framework\View\Model\ViewModel;
use Framework\View\ViewPlugin;

class Model
    implements Plugin, ViewModel
{
    /**
     *
     */
    use Base;
    use ViewPlugin;
}
