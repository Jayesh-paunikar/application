<?php

namespace Application\Home;

use Framework\Controller\Controller\EventInterface;
use Framework\Request\RequestInterface;
use Framework\Response\ResponseInterface;

interface ControllerInterface
{
    /**
     * @param EventInterface $event
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return mixed
     */
    public function __invoke(EventInterface $event, RequestInterface $request, ResponseInterface $response);
}
