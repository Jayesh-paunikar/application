<?php

namespace Blog;

use Framework\Event\Event as Base;
use Framework\Event\EventTrait as Event;
use Framework\View\Model\ServiceTrait as View;
use Framework\View\Model\ViewModel;
use Framework\Service\Resolver\SignalTrait as Signal;

class Create
    implements Base, BlogCreate
{
    /**
     *
     */
    use Event;
    use Signal;
    use View;

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
