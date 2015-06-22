<?php
/**
 *
 */

//demo calling specific service methods
return [
    'blog:create' => new RecursiveIteratorIterator(new RecursiveArrayIterator([
        ['@Blog\Controller\Validate'],
        ['@Blog\Controller\Add'],
        ['@Blog\Controller\Respond']
    ])),

    'Service\Provider' => [
        'Service\Resolver\Manager'
    ],

] + include __DIR__ . '/../vendor/mvc5/framework/config/event.php';
