<?php
/**
 *
 */

namespace Console;

use Home\Model;

class Example
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Model $model
     */
    function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $day
     * @param $month
     */
    function __invoke($day, $month)
    {
        var_dump($this->model);
        echo $day . ' ' . $month . "\n";
    }
}
