<?php
/**
 *
 */

use Mvc5\Service\Config\Invoke\Invoke;
use Mvc5\Service\Config\Service\Service;
use Mvc5\View\Model\Model;

return [
    'blog:create' => new Service('Blog\Create'),
    'blog:valid'  => new Invoke('Blog\Controller\Validate', ['model' => new Model('blog:create')])
] + include __DIR__ . '/../vendor/mvc5/framework/config/alias.php';
