<?php

namespace Blog;

use Framework\Request\RequestInterface as Request;
use Framework\Response\ResponseInterface as Response;

class Controller
    implements ControllerInterface
{
    /**
     * @param Request $request
     * @param $layout
     * @return Blog
     */
    public function valid(Request $request, $layout)
    {
        var_dump(__FUNCTION__.' :: '.__FILE__, $layout);
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
