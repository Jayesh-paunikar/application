<?php
/**
 *
 */

use Mvc5\Service\Config\Service\Service;

return [
    'blog:create' => new Service('Blog\Create\Create'),
] + include __DIR__ . '/../vendor/mvc5/framework/config/alias.php';
