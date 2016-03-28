<?php
/**
 *
 */

namespace Response;

use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class HttpResponse
    extends HttpFoundationResponse
    implements Response
{
    /**
     *
     */
    use Base;
}
