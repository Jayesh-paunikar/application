<?php
/**
 *
 */

namespace Session;

use Mvc5\Config as Mvc5Config;
use Mvc5\Config\Config as Base;
use Mvc5\Config\PropertyAccess;
use Mvc5\Config\Configuration;

class Container
    implements \Session
{
    /**
     *
     */
    use Base;
    use PropertyAccess;

    /**
     * @var Configuration
     */
    protected $container;

    /**
     * @var string
     */
    protected $name = self::class;

    /**
     * @param Configuration $container
     * @param string $name
     */
    function __construct(Configuration $container, $name = null)
    {
        $this->container = $container;

        $name && $this->name = $name;

        !isset($this->container[$this->name]) &&
            ($this->container[$this->name] = $this->config = new Mvc5Config);

        !$this->config &&
            $this->config = $this->container[$this->name];
    }

    /**
     *
     */
    function __clone()
    {
    }
}
