<?php

namespace Blog\Post;

use Framework\Config\Configuration;
use Framework\Config\Base as Config;
use Framework\Event\Base;
use Framework\Event\Event;
use Framework\View\Model\Service\ViewModel;
use Framework\Response\Response;
use Framework\Service\Resolver\Signal;
use Iterator;

class Post
    implements Configuration, Creator, Event, Iterator
{
    /**
     *
     */
    use Base;
    use Config;
    use Signal;
    use ViewModel;

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

        if ($response instanceof Response) {
            $this->stop();
            return $response;
        }

        $response && $this->setModel($response);

        return $response;
    }
}
