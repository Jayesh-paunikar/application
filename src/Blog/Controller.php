<?php

namespace Blog;

use Framework\View\Model\ServiceTrait as View;
use Framework\Request\RequestInterface as Request;
use Framework\Response\ResponseInterface as Response;

class Controller
    implements ControllerInterface
{
    /**
     *
     */
    use View;

    /**
     * @param Request $request
     * @return Blog
     */
    public function valid(Request $request)
    {
        var_dump(__FUNCTION__.' :: '.__FILE__);
        return  new Blog;
    }

    public function add(BlogInterface $blog = null)
    {
        var_dump(__FUNCTION__.' :: '.__FILE__, $blog);
    }

    public function response(Response $response, ViewModelInterface $viewModel = null)
    {
        var_dump(__FUNCTION__.' :: '.__FILE__);
    }
}
