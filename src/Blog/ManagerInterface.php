<?php

namespace Blog;

use Request\RequestInterface as Request;
use Response\ResponseInterface as Response;

interface ManagerInterface
{
    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    function createBlog(Request $request, Response $response);
}
