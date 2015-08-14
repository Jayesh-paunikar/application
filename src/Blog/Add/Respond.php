<?php

namespace Blog\Add;

use Mvc5\View\Model\ViewModel;
use Response\Response;

class Respond
{
    /**
     * @param Response $response
     * @param ViewModel $model
     * @return ViewModel
     */
    public function __invoke(Response $response, ViewModel $model = null)
    {
        $args   = $model['args'];
        $args[] = __CLASS__;

        $model->set('args', $args);

        return $model;
    }
}
