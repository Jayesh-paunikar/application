<?php

namespace Blog;

use Framework\Request\RequestInterface as Request;
use Framework\Response\ResponseInterface as Response;

interface ServiceInterface
{
    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    function createBlog(Request $request, Response $response);
}
