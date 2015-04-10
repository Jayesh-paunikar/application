<?php

namespace Console;

use Mvc5\View\Model\ViewModel;

class Example
{
    /**
     * @var ViewModel
     */
    protected $model;

    public function __construct(ViewModel $model)
    {
        $this->model = $model;
    }

    public function __invoke($day, $month)
    {
        var_dump($this->model);
        echo $day . ' ' . $month . "\n";
    }
}
