<?php
/**
 *
 */

namespace Server\Config;

use Mvc5\Arg;
use Mvc5\Config\Config;
use Mvc5\Request\Headers;
use Mvc5\Request\Uri;

trait Server
{
    /**
     *
     */
    use Config;

    /**
     * @return string
     */
    public function documentRoot()
    {
        return $this['DOCUMENT_ROOT'];
    }

    /**
     * @return array
     */
    public function uri()
    {
        return $this['PHP_URI'];
    }
}
