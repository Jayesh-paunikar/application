<?php

namespace Blog\Create;

use Mvc5\Event\Base;
use Mvc5\Event\Event;
use Mvc5\View\ViewModel;
use Mvc5\Service\Resolver\Signal;

class Create
    implements Creator, Event
{
    /**
     *
     */
    use Base;
    use Signal;
    use ViewModel;

    const EVENT = self::CREATE;

    /**
     * @return array
     */
    protected function args()
    {
        return [
            Args::EVENT => $this,
            Args::MODEL => $this->model()
        ];
    }

    /**
     * @param callable $callable
     * @param array $args
     * @param callable $callback
     * @return mixed
     */
    public function __invoke(callable $callable, array $args = [], callable $callback = null)
    {
        $response = $this->signal($callable, $this->args() + $args, $callback);

        $response && $this->setModel($response);

        return $response;
    }
}
