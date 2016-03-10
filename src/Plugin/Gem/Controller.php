<?php
/**
 *
 */

namespace Plugin\Gem;

use Mvc5\Resolvable;

interface Controller
    extends Resolvable
{
    /**
     * @return string
     */
    function config();
}
