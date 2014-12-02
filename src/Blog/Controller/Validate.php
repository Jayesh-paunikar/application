<?php

namespace Blog\Controller;

use Framework\View\ViewModel;
use Framework\View\Model\ViewModel as Model;
use Request\Request;

class Validate
{
    /**
     *
     */
    use ViewModel;

    /**
     * @param Request $request
     * @return Model
     */
    public function __invoke(Request $request)
    {
        return $this->view('blog:create', ['args' => [__CLASS__]]);
    }
}
