<?php
/**
 *
 */

namespace Blog\Add;

use Response\Response;

class Respond
{
    /**
     * @param Response $response
     * @param Model $model
     * @return Model
     */
    public function __invoke(Response $response, Model $model = null)
    {
        $model->vars(['args' =>  array_merge([__CLASS__], $model['args'])]);

        return $model;
    }
}
