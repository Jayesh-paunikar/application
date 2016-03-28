<?php
/**
 *
 */

namespace Response;

use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class RedirectResponse
    extends HttpFoundationRedirectResponse
    implements Response
{
    /**
     *
     */
    use Base;
}
