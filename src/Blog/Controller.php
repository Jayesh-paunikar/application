<?php

namespace Blog;

class Controller
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function test()
    {
        return $this->model;
    }
}
