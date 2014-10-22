<?php

namespace Blog;

use Request\RequestInterface as Request;
use Response\ResponseInterface as Response;

interface BlogController
{
    /**
     * @param Request $request
     * @return mixed
     */
    function valid(Request $request);

    /**
     * @param BlogModel $blog
     * @return mixed
     */
    function add(BlogModel $blog = null);

    /**
     * @param Response $response
     * @param BlogViewModel $viewModel
     * @return mixed
     */
    function response(Response $response, BlogViewModel $viewModel = null);
}
