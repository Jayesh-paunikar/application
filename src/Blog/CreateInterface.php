<?php

namespace Blog;

interface CreateInterface
{
    /**
     *
     */
    const CREATE = 'BlogCreate';

    /**
     * @param callable $listener
     * @param array $options
     * @param callable $callback
     * @return mixed
     */
    function __invoke(callable $listener, array $options = [], callable $callback = null);
}
