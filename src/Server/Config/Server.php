<?php
/**
 *
 */

namespace Server\Config;

use Mvc5\Config\Config;
use Mvc5\Service\Scope;

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

    /**
     *
     */
    public function __clone()
    {
        if (!is_object($this->config)) {
            return;
        }

        if (!$this->config instanceof Scope) {
            $this->config = clone $this->config;
        }

        $this->config->scope(true);

        $this->config = clone $this->config;

        $this->config->scope($this);
    }
}
