<?php
/**
 *
 */

namespace Blog\Add;

use Mvc5\Model\ViewModel;
use Mvc5\Model\Plugin;

class Model
    implements ViewModel
{
    /**
     *
     */
    use Plugin;

    /**
     *
     */
    const TEMPLATE_NAME = 'blog:create';
}
