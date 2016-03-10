<?php
/**
 *
 */

namespace Response;

use Symfony\Component\HttpFoundation\Response as Base;
use UnexpectedValueException;

class HttpResponse
    extends Base
    implements Response
{
    /**
     * @return mixed
     */
    public function content()
    {
        return parent::getContent();
    }

    /**
     * @return void
     */
    public function send()
    {
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
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
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
