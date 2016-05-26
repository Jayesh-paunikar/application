<?php
/**
 *
 */

namespace Session\Config;

use Mvc5\Model\Config;
use Mvc5\Model\Config\Model;
use Session\Session as _Session;

trait Container
{
    /**
     *
     */
    use Model;

    /**
     * @var _Session
     */
    protected $container;

    /**
     * @var string
     */
    protected $name = self::class;

    /**
     * @param _Session $container
     * @param string $name
     */
    function __construct(_Session $container, $name = null)
    {
        $this->container = $container;

        $name && $this->name = $name;

        !isset($this->container[$this->name]) &&
            ($this->container[$this->name] = $this->config = new Config);

        !$this->config &&
            $this->config = $this->container[$this->name];
    }

    /**
     * @param bool|true $cookie
     */
    function destroy($cookie = true)
    {
        $this->container->destroy($cookie);
    }
}
