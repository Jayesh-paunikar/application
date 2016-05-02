<?php
/**
 *
 */

namespace Server\Config;

use Mvc5\Service\Config\Scope;

trait Server
{
    /**
     *
     */
    use Scope;

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
