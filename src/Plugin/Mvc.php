<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\Dependency;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Plugin;
use Mvc\Event\Model;

class Mvc
    extends Plugin
{
    /**
     * @param string $name
     * @param array $args
     * @param array $calls
     * @param string $param
     */
    public function __construct($name = null, array $args = [], array $calls = [], $param = Arg::ITEM)
    {
        parent::__construct($name ?? Model::class, ['mvc', new Link], [new Dependency(Arg::ROUTE)], $param);
    }
}
