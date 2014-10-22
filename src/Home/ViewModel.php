<?php

namespace Home;

use Framework\View\Model\BaseModel;
use Framework\View\ViewPlugin;
use Framework\View\Model\ViewModel as Base;

class ViewModel
    implements Base, HomeViewModel
{
    /**
     *
     */
    use BaseModel;
    use ViewPlugin;
}
