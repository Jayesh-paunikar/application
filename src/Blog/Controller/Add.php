<?php

namespace Blog\Controller;

use Framework\View\Model\ViewModel;

class Add
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
