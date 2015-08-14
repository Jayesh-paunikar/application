<?php

namespace Blog\Add;

use Mvc5\View\ViewModel;
use Mvc5\View\Model\ViewModel as Model;
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
