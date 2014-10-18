<?php

namespace Blog;

use Request\RequestInterface as Request;
use Response\ResponseInterface as Response;

interface ServiceInterface
{
    /**
     * @param Request $request
     * @param Response $response
     * @param callable $callback
     * @return mixed
     */
    function createBlog(Request $request, Response $response, callable $callback = null);
}
