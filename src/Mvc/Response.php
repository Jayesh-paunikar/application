<?php
/**
 *
 */

namespace Mvc;

use Mvc5\Response\Response as Mvc5Response;

/**
 * Assign the model to the Response and return the Response. Should be used with the Mvc\Event\Model.
 */
class Response
{
    /**
     * @param Mvc5Response $response
     * @param mixed $model
     * @return Mvc5Response
     */
    public function __invoke(Mvc5Response $response, $model = null)
    {
        return null !== $model ? $response->setContent($model) : $response;
    }
}
