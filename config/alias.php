<?php
/**
 *
 */

use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Service\Service;
use Framework\View\Model\Model;

return array_replace(
    include __DIR__ . '/../vendor/mvc5/framework/config/alias.php',
    [
        'blog:create'   => new Service('Blog\Create'),
        'blog:valid'    => new Invoke('Blog\Controller\Validate', ['model' => new Model('blog:create')]),
        'sm'            => new Dependency('Service\Manager'),
        'pathinfo'      => new Call('request.getPathInfo'),
        'viewManager'   => new Dependency('View\Manager'),
        'vm'            => new Dependency('View\Manager'),
    ]
);
