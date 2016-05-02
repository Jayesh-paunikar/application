<?php
/**
 *
 */

namespace Response;

use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use UnexpectedValueException;

trait Base
{
    /**
     * @return mixed
     */
    function content()
    {
        /** @var HttpFoundationResponse $this */

        return $this->getContent();
    }

    /**
     * @return void
     */
    function send()
    {
        /** @var HttpFoundationResponse $this */

        if (null !== $this->content
            && !is_string($this->content)
            && !is_bool($this->content)
            && !is_numeric($this->content)
            && !is_callable(array($this->content, '__toString'))) {

            $msg = sprintf(
                'The response content must be a string or object implementing __toString(), "%s" given.',
                gettype($this->content)
            );

            throw new UnexpectedValueException($msg);
        }

        parent::send();
    }

    /**
     * @param mixed $content
     * @return self
     */
    function setContent($content)
    {
        /** @var HttpFoundationResponse $this */

        $this->content = $content;

        return $this;
    }

    /**
     * @param int $code
     * @param string $text
     * @return self
     */
    function setStatus($code, $text = '')
    {
        /** @var HttpFoundationResponse $this */

        $this->setStatusCode($code, $text);
    }

    /**
     * @return int
     */
    function status()
    {
        /** @var HttpFoundationResponse $this */

        return $this->getStatusCode();
    }
}
