<?php
/**
 *
 */

namespace Response\Psr\Compatible;

use Response\Psr\Compliant\Response as PsrResponse;
use Slim\Http\Headers;
use Slim\Http\HeadersInterface;

/**
 * Allows the "body" attribute to be of any "type" and is initially null.
 */
class Response
    extends PsrResponse
{
    /**
     * @param int $status
     * @param HeadersInterface|null $headers
     */
    function __construct($status = 200, HeadersInterface $headers = null)
    {
        $this->status  = $this->filterStatus($status);
        $this->headers = $headers ? $headers : new Headers();
    }

    /**
     * @param mixed $content
     * @return self
     */
    function setContent($content)
    {
        $clone = clone $this;
        $clone->body = $content;

        return $clone;
    }

    /**
     *
     */
    function __clone()
    {
        $this->headers = clone $this->headers;

        is_object($this->body) &&
            $this->body = clone $this->body;
    }
}
