<?php

namespace Blog\Post;

interface Creator
{
    /**
     * @param callable $listener
     * @param array $options
     * @param callable $callback
     * @return mixed
     */
    function __invoke(callable $listener, array $options = [], callable $callback = null);
}
