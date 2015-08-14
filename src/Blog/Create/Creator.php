<?php

namespace Blog\Create;

interface Creator
{
    /**
     *
     */
    const CREATE = 'blog:create';

    /**
     * @param callable $listener
     * @param array $options
     * @param callable $callback
     * @return mixed
     */
    function __invoke(callable $listener, array $options = [], callable $callback = null);
}
