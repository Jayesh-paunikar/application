<?php
/**
 *
 */

namespace Server\Config;

use Mvc5\Config\Config;

trait Server
{
    /**
     *
     */
    use Config;

    /**
     * @return string
     */
    function documentRoot()
    {
        return $this['DOCUMENT_ROOT'];
    }

    /**
     * @return array
     */
    function uri()
    {
        return $this['PHP_URI'];
    }
}
