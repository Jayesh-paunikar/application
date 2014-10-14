<?php

namespace Blog;

interface CreateInterface
{
    /**
     *
     */
    const CREATE = 'CreateBlog';

    /**
     * @param callable $listener
     * @param array $options
     * @return mixed
     */
    function __invoke(callable $listener, array $options = []);
}
