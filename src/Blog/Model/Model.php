<?php

namespace Blog\Model;

use ArrayAccess;
use Framework\View\Model\Base;
use Framework\View\Model\Plugin;
use Framework\View\ViewPlugin;

class Model
    implements ArrayAccess, Blog, Plugin, ViewModel
{
    use Base;
    use ViewPlugin;
}
