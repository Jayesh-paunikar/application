<?php
/**
 *
 */

use Mvc5\Plugin\Dependency;

return [
    'accept' => new Dependency('accept', function() {
        return $this->http->getAcceptableContentTypes();
    }),
    'args' => new Dependency('args', function() {
        return $this->http->query->all();
    }),
    'body' => new Dependency('body', function() {
        return $this->http->getContent();
    }),
    'client_address' => new Dependency('client_address', function() {
        return $this->http->getClientIp();
    }),
    'content_type' => new Dependency('content_type', function() {
        return $this->http->getContentType();
    }),
    'controller' => function(){},
    'cookies'    => null,
    'data' => new Dependency('data', function() {
        return $this->http->request->all();
    }),
    'error'     => function() {},
    'exception' => function() {},
    'files' => new Dependency('files', function() {
        return $this->http->files->all();
    }),
    'headers' => new Dependency('headers', function() {
        return getallheaders(); //$this->http->headers->all();
    }),
    'length' => function(){},
    'method' => new Dependency('method', function() {
        return $this->http->getMethod();
    }),
    'name'   => function(){},
    'params' => function(){},
    'path'   => function(){},
    'port'   => function(){},
    'server' => function() {
        return $this->http->server->all();
    },
    'session' => null,
    'stream'  => function() {
        return $this->http->getContent(true);
    },
    'uri' => new Dependency('uri', function() {
        return [
            'scheme' => $this->http->getScheme(),
            'host'   => $this->http->getHttpHost(),
            'port'   => $this->http->getPort(),
            'user'   => $this->http->getUser(),
            'pass'   => $this->http->getPassword(),
            'path'   => urldecode($this->http->getPathInfo()),
            'query'  => $this->http->getQueryString(),
        ];
    }),
    'user' => function(){},
    'user_agent' => new Dependency('user_agent', function() {
        return $this->http->server->get('HTTP_USER_AGENT');
    }),
    'version' => new Dependency('version', function() {
        return substr($this->http->server->get('SERVER_PROTOCOL'), strlen('HTTP/'));
    }),
];
