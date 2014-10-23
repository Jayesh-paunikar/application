<?php

namespace Blog;

use Framework\Event\Base;
use Framework\Event\Event;
use Framework\View\Model\Service\ViewModel as Model;
use Framework\View\Model\ViewModel;
use Framework\Service\Resolver\Signal;

class Create
    implements BlogCreate, Event
{
    /**
     *
     */
    use Base;
    use Signal;
    use Model;

    const EVENT = self::CREATE;

    /**
     * @var BlogModel
     */
    protected $blog;

    /**
     * @return array
     */
    protected function args()
    {
        return [
            ArgsInterface::BLOG       => $this->blog(),
            ArgsInterface::EVENT      => $this,
            ArgsInterface::VIEW_MODEL => $this->viewModel()
        ];
    }

    /**
     * @return BlogModel
     */
    public function blog()
    {
        return $this->blog;
    }

    /**
     * @param callable $listener
     * @param array $args
     * @param callable $callback
     * @return mixed
     */
    public function __invoke(callable $listener, array $args = [], callable $callback = null)
    {
        $response = $this->signal($listener, $this->args() + $args, $callback);

        switch(true) {
            default:
                break;
            case $response instanceof BlogModel:

                $this->blog = $response;

                break;
            case $response instanceof BlogViewModel:
                /** @var $response ViewModel */

                $this->setViewModel($response);

                break;
        }

        return $response;
    }
}
