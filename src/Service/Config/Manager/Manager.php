<?php
/**
 *
 */

namespace Service\Config\Manager;

use Mvc5\Service\Resolver\Resolvable;

class Manager
    implements Resolvable, ServiceManager
{
    /**
     * @var string
     */
    protected $config;

    /**
     * @param string $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function config()
    {
        return $this->config;
    }
}
