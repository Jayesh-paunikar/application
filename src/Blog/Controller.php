<?php

namespace Blog;

class Controller
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var string
     */
    protected $template;

    /**
     * @param Model $model
     * @param $template
     */
    public function __construct(Model $model, $template)
    {
        $this->model    = $model;
        $this->template = $template;
    }

    /**
     * @return Model
     */
    public function test()
    {
        $this->model->template($this->template);

        return $this->model;
    }
}
