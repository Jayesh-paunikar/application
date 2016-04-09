<?php
/**
 *
 */

namespace Server;

use Mvc5\Config\Configuration;

interface Server
    extends Configuration
{
    /**
     * @return string
     */
    function documentRoot();

    /**
     * @return null|array
     */
    function uri();
}
