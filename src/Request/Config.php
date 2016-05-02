<?php
/**
 *
 */

namespace Request;

use Mvc5\Config\Configuration;
use Mvc5\Request\Config as Mvc5Request;
use Symfony\Component\HttpFoundation\ApacheRequest as HttpRequest;

class Config
    extends Mvc5Request
    implements \Request
{

    /**
     * @var array|Configuration
     */
    protected $config = [];

    /**
     * @var HttpRequest
     */
    protected $http;

    /**
     * @param array $config
     * @param HttpRequest $http
     */
    function __construct($config = [], HttpRequest $http)
    {
        $this->config = $config;
        $this->http   = $http;
    }
}
