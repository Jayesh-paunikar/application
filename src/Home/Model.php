<?php

namespace Home;

use Framework\View\Model\Base;
use Framework\View\ViewPlugin;
use Framework\View\Model\ViewModel;

class Model
    implements ViewModel, HomeModel
{
    /**
     *
     */
    use Base;
    use ViewPlugin;
}
