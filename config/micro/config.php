<?php
/**
 *
 */

return array_merge(
    include __DIR__ . '/../config.php',
    [
        'routes' => include __DIR__ . '/route.php',
    ]
);
