<?php

namespace Blog;

use Request\RequestInterface as Request;
use Framework\Response\ResponseInterface as Response;

class Controller
    implements ControllerInterface
{
    /**
     * @param Request $request
     * @return Blog
     */
    public function valid(Request $request)
    {
        var_dump(__FUNCTION__.' :: '.__FILE__);
        return  new Blog;
    }

    /**
     * @param BlogInterface $blog
     * @return mixed|void
     */
    public function add(BlogInterface $blog = null)
    {
        var_dump(__FUNCTION__.' :: '.__FILE__, $blog);
    }

    /**
     * @param Response $response
     * @param ViewModelInterface $viewModel
     * @param array $args
     * @return mixed|void
     */
    public function response(Response $response, ViewModelInterface $viewModel = null, array $args = [])
    {
        var_dump(__FUNCTION__.' :: '.__FILE__, $args);
    }
}
