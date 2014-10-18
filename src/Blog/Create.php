<?php

namespace Blog;

use Framework\Event\EventInterface;
use Framework\Event\EventTrait as Event;
use Framework\View\Model\ServiceTrait as View;
use Framework\View\Model\ModelInterface as ViewModel;
use Framework\Service\Resolver\SignalTrait as Signal;

class Create
    implements CreateInterface, EventInterface
{
    /**
     *
     */
    use Event;
    use Signal;
    use View;

    const EVENT = self::CREATE;

    /**
     * @var BlogInterface
     */
    protected $blog;

    /**
     * @return array
     */
    protected function args()
    {
        return [
            ArgsInterface::BLOG       => $this->blog,
            ArgsInterface::EVENT      => $this,
            ArgsInterface::VIEW_MODEL => $this->viewModel()
        ];
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
            case $response instanceof BlogInterface:

                $this->blog = $response;

                break;
            case $response instanceof ViewModelInterface:
                /** @var $response ViewModel */

                $this->setViewModel($response);

                break;
        }

        return $response;
    }
}
