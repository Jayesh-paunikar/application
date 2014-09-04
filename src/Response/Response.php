<?php

namespace Application\Response;

use Zend\Http\PhpEnvironment\Response as HttpResponse;

class Response
    extends HttpResponse
    implements ResponseInterface
{
    /**
     * @return mixed
     */
    public function content()
    {
        return parent::getContent();
    }

    /**
     * @return array|\Traversable
     */
    public function headers()
    {
        return parent::getHeaders();
    }

    /**
     * @return string
     */
    public function reason()
    {
        return parent::getReasonPhrase();
    }

    /**
     * @return int
     */
    public function status()
    {
        return parent::getStatusCode();
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
     * @param $reason
     * @return void
     */
    public function setReason($reason)
    {
        parent::setReasonPhrase($reason);
    }

    /**
     * @param int $code
     * @return void
     */
    public function setStatus($code)
    {
        parent::setStatusCode($code);
    }

    /**
     * @return int
     */
    public function version()
    {
        return parent::getVersion();
    }

    /**
     * @param $version
     * @return void
     */
    public function setVersion($version)
    {
        parent::setVersion($version);
    }
}
