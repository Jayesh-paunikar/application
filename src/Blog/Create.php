<?php

namespace Blog;

use Framework\Event\Base;
use Framework\Event\Event;
use Framework\View\ViewModel;
use Framework\Service\Resolver\Signal;

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
