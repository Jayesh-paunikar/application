<?php

namespace Request;

use Symfony\Component\HttpFoundation\ApacheRequest as HttpRequest;

class Request
    extends HttpRequest
    implements RequestInterface
{
}
