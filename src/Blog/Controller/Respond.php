<?php

namespace Blog\Controller;

use Blog\Model\Model;
use Response\Response;

class Respond
{
    public function __invoke(Response $response, Model $model = null)
    {
        $args   = $model['args'];
        $args[] = __CLASS__;

        $model->set('args', $args);

        return $model;
    }
}
