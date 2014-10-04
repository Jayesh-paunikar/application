<?php

namespace Blog;

use Framework\Event\Args\ArgsInterface as EventArgsInterface;
use Framework\Service\Resolver\ArgsTrait;

class Args
    implements ArgsInterface, EventArgsInterface
{
    /**
     *
     */
    use ArgsTrait;
}
