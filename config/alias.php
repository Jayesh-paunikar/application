<?php
/**
 *
 */

use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Service\Service;
use Framework\View\Model\Model;

return [
    'blog:create'  => new Service('Blog\Create'),
    'blog:valid'   => new Invoke('Blog\Controller\Validate', ['model' => new Model('blog:create')]),
    'config'       => new Dependency('Config'),
    'layout'       => new Dependency('Layout'),
    'request'      => new Dependency('Request'),
    'sm'           => new Dependency('Service\Manager'),
    'response'     => new Dependency('Response'),
    'pathinfo'     => new Call('request.getPathInfo'),
    'plugin'       => new Dependency('Plugin'),
    'translate'    => new Dependency('Translator\Plugin'),
    'url'          => new Dependency('Route\Generator\Plugin'),
    'viewManager'  => new Dependency('View\Manager'),
    'vm'           => new Dependency('View\Manager'),
    'web'          => new Service('Mvc'),
    'micro'        => new Service('Mvc'),
    'route:create' => new Invoke('Route\Builder')
];
