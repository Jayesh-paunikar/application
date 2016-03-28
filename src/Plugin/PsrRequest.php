<?php
/**
 *
 */

namespace Plugin;

use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Call;

class PsrRequest
    extends Call
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct(
            '@Request\Psr\HttpRequest::createFromEnvironment', [new Plugin('Slim\Http\Environment', [$_SERVER])]
        );
    }
}
