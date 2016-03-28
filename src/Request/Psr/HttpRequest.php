<?php
/**
 *
 */

namespace Request\Psr;

use Slim\Http\Request as SlimHttpRequest;

class HttpRequest
    extends SlimHttpRequest
    implements Request
{
}
