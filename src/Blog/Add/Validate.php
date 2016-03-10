<?php
/**
 *
 */

namespace Blog\Add;

use Request\Request;

class Validate
{
    /**
     * @param Request $request
     * @param Model $model
     * @return Model
     */
    public function __invoke(Request $request, Model $model)
    {
        $model->vars(['args' => [__CLASS__]]);

        return $model;
    }
}
