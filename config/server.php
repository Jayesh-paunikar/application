<?php
/**
 *
 */

use Mvc5\Plugin\Dependency;
use Server\Server;

return [
    'PHP_URI' => new Dependency('PHP_URI', function(Server $server) {

        /** @var Server $this */

        $scheme = !$this['HTTPS'] || $this['HTTPS'] === 'off' ? 'http' : 'https';
        $host   = $this['HTTP_HOST'] ?: $this['SERVER_NAME'];
        $port   = $this['PORT'] ?: 80;
        $uri    = $this['REQUEST_URI'];

        $url = $scheme . '://' . $host . ($port ? ':' . $port : '') . '/' . ltrim($uri, '/');

        $uri = parse_url($url);

        if (isset($uri['query'])) {
            $args = [];

            parse_str($uri['query'], $args);

            $args && $uri['args'] = $args;
        }

        $uri['method'] = $this['REQUEST_METHOD'];

        return $uri;
    }),
    'container' => $_SERVER
];
