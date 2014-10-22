<?php

namespace Blog;

use Request\Request;
use Response\Response;

class Controller
    implements BlogController
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
     * @param BlogModel $blog
     * @return mixed|void
     */
    public function add(BlogModel $blog = null)
    {
        var_dump(__FUNCTION__.' :: '.__FILE__, $blog);
    }

    /**
     * @param Response $response
     * @param BlogViewModel $viewModel
     * @param array $args
     * @return mixed|void
     */
    public function response(Response $response, BlogViewModel $viewModel = null, array $args = [])
    {
        var_dump(__FUNCTION__.' :: '.__FILE__, $args);
    }
}
