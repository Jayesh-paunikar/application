<?php
/**
 *
 */

//demo calling specific service methods
return array_replace(
    include __DIR__ . '/../vendor/mvc5/framework/config/event.php',
    [
        'blog:create' => [
            ['@Blog\Controller\Validate'],
            ['@Blog\Controller\Add'],
            ['@Blog\Controller\Respond']
        ]
    ]
);
