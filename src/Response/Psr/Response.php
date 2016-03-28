<?php
/**
 *
 */

namespace Response\Psr;

use Psr\Http\Message\ResponseInterface;
use Response\Response as Base;

interface Response
    extends Base,
            ResponseInterface
{
}
