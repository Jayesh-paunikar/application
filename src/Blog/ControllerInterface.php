<?php

namespace Blog;

use Framework\Request\RequestInterface as Request;
use Framework\Response\ResponseInterface as Response;

interface ControllerInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    function valid(Request $request);

    /**
     * @param BlogInterface $blog
     * @return mixed
     */
    function add(BlogInterface $blog = null);

    /**
     * @param Response $response
     * @param ViewModelInterface $viewModel
     * @return mixed
     */
    function response(Response $response, ViewModelInterface $viewModel = null);
}
