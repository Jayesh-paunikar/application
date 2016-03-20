<?php
/**
 *
 */

namespace View\Template;

use Mvc5\Model;
use Mvc5\Model\Template;
use Mvc5\Signal;
use Mvc5\View\Template\Renderer;

class Render
{
    /**
     *
     */
    use Signal;

    /**
     * @var callable
     */
    protected $model;

    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * @param Renderer $renderer
     * @param callable $model
     */
    public function __construct(Renderer $renderer, callable $model)
    {
        $this->model    = $model;
        $this->renderer = $renderer;
    }

    /**
     * @param string|Template $template
     * @param array $args
     * @return mixed|Template
     */
    protected function model($template, array $args = [])
    {
        return $template instanceof Template ? $this->template($template, $args) :
            $this->signal($this->model, [$template, $args]);
    }

    /**
     * @param Template $template
     * @param array $args
     * @return Template
     */
    protected function template(Template $template, array $args = [])
    {
        $args && ($template = clone $template) && $template->vars($args);

        return $template;
    }

    /**
     * @param string|Template $template
     * @param array $args
     * @return mixed
     */
    public function __invoke($template, array $args = [])
    {
        return $this->signal($this->renderer, [$this->model($template, $args)]);
    }
}
