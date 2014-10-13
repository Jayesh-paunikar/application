<?php

namespace Blog;

use Framework\Event\Manager\EventManagerInterface as EventManagerInterface;
use Framework\Event\Manager\EventsTrait as Events;
use Framework\Request\RequestInterface as Request;
use Framework\Response\ResponseInterface as Response;
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
     * @return mixed
     */
    public function createBlog(Request $request, Response $response)
    {
        return $this->trigger(['Blog\Create', $request, $response]);
    }
}
