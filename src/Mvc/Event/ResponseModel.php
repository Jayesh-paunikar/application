<?php
/**
 *
 */

namespace Mvc\Event;

use Mvc5\Mvc;

/**
 * Assign the response to the container.
 */
class ResponseModel
    extends Mvc
{
    /**
     * @param $model
     * @return array|callable|null|object|string
     */
    protected function model($model = null)
    {
        if (null !== $model) {
            $this->response($this->response()->setContent($model));

            return $model;
        }

        return $this->response()->content();
    }
}
