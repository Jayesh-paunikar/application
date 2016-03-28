<?php
/**
 *
 */

namespace Request\Psr;

use Request\Request as RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

interface Request
    extends RequestInterface, ServerRequestInterface
{
}
