<?php

namespace Application\Response;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Response
    extends HttpResponse
    implements ResponseInterface
{
    /**
     * @return void
     */
    public function send()
    {
        parent::send();
    }

    /**
     * @param mixed $content
     * @return void
     */
    public function setContent($content)
    {
        parent::setContent($content);
    }

    /**
     * @param int $code
     * @return void
     */
    public function setStatus($code)
    {
        parent::setStatusCode($code);
    }
}
