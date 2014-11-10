<?php

namespace Blog\Controller;

use Blog\Model\Model;

class Add
{
    /**
     * @param Model $model
     * @return mixed|void
     */
    public function __invoke(Model $model = null)
    {
        $args = $model['args'];

        $args[] = __CLASS__;

        $model->args = $args;

        return $model;
    }
}
