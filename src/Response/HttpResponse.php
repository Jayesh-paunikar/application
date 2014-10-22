<?php

namespace Response;

use Symfony\Component\HttpFoundation\Response as Base;

class HttpResponse
    extends Base
    implements Response
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
