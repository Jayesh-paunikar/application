<?php

namespace Blog\Add;

use Mvc5\View\Model\ViewModel;

class Save
{
    /**
     * @param ViewModel $model
     * @return mixed|void
     */
    public function __invoke(ViewModel $model = null)
    {
        $args   = $model['args'];
        $args[] = __CLASS__;

        $model->set('args', $args);

        return $model;
    }
}
