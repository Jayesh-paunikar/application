<?php

namespace Home;

interface FactoryInterface
{
    /**
     * @return Controller
     */
    function __invoke();
}
