<?php

namespace Blog\Controller;

use Blog\Model\Blog;
use Blog\Model\Model;
use Request\Request;

class Validate
{
    /**
     * @param Request $request
     * @param Model $model
     * @return Blog
     */
    public function __invoke(Request $request, Model $model = null)
    {
        $args = $model['args'];

        $args[] = __CLASS__;

        $model->args = $args;

        return $model;
    }
}
