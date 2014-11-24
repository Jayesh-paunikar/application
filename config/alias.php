<?php
/**
 *
 */

use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Service\Service;
use Framework\View\Model\Model;

return [
    'blog:create'   => new Service('Blog\Create'),
    'blog:valid'    => new Invoke('Blog\Controller\Validate', ['model' => new Model('blog:create')]),
    'pathinfo'      => new Call('request.getPathInfo'),
] + include __DIR__ . '/../vendor/mvc5/framework/config/alias.php';
