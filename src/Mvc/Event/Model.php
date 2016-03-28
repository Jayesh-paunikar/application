<?php
/**
 *
 */

namespace Mvc\Event;

use Mvc5\Mvc;

/**
 * Locally assign the model.
 */
class Model
    extends Mvc
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param $model
     * @return array|callable|null|object|string
     */
    protected function model($model = null)
    {
        return null !== $model ? $this->model = $model : $this->model;
    }
}
