<?php

namespace Blog;

use Framework\Event\Manager\EventManagerInterface as EventManagerInterface;
use Framework\Event\Manager\EventsTrait as Events;
use Request\RequestInterface as Request;
use Response\ResponseInterface as Response;
use Framework\Service\Manager\ManagerInterface as ServiceManagerInterface;

class Service
    implements EventManagerInterface, ServiceManagerInterface, ServiceInterface
{
    /**
     *
     */
    use Events;

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $plugin
     * @return mixed
     */
    public function createBlog(Request $request, Response $response, callable $plugin = null)
    {
        return $this->trigger(['Blog\Create'], ['request' => $request, 'response' => $response], $plugin);
        //return $this->trigger('CreateBlog', [$request, $response], $plugin);
        //return $this->trigger('CreateBlog', ['request' => $request, 'response' => $response], $plugin);
    }
}

