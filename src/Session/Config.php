<?php
/**
 *
 */

namespace Session;

use Mvc5\Config\ArrayAccess;

class Config
    implements \Session
{
    /**
     *
     */
    use ArrayAccess;

    /**
     * @return int
     */
    function count()
    {
        return count($_SESSION);
    }

    /**
     * @return mixed
     */
    function current()
    {
        return current($_SESSION);
    }

    /**
     * @param string $name
     * @return mixed
     */
    function get($name)
    {
        return $_SESSION[$name] ?? null;
    }

    /**
     * @param string $name
     * @return bool
     */
    function has($name)
    {
        return isset($_SESSION[$name]);
    }

    /**
     * @return mixed
     */
    function key()
    {
        return key($_SESSION);
    }

    /**
     *
     */
    function next()
    {
        next($_SESSION);
    }

    /**
     * @param string $name
     * @return void
     */
    function remove($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     *
     */
    function rewind()
    {
        reset($_SESSION);
    }

    /**
     * @param string $name
     * @param mixed $config
     * @return mixed $config
     */
    function set($name, $config)
    {
        return $_SESSION[$name] = $config;
    }

    /**
     * @return bool
     */
    function valid()
    {
        return null !== $this->key();
    }
}
