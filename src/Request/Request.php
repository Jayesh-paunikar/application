<?php

namespace Application\Request;

use Symfony\Component\HttpFoundation\ApacheRequest as HttpRequest;

class Request
    extends HttpRequest
    implements RequestInterface
{
    /**
     *
     */
    public function __construct()
    {
    }
}
