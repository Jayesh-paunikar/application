<?php

namespace Application\Request;

use Zend\Http\PhpEnvironment\Request as HttpRequest;
use Zend\Stdlib\Parameters;

class Request
    extends HttpRequest
    implements RequestInterface
{
    /**
     * @param array $env
     * @param array $get
     * @param array $post
     * @param array $cookie
     * @param array $files
     * @param array $server
     */
    public function __construct(array $env, array $get, array $post, array $cookie, array $files, array $server)
    {
        $this->setEnv(new Parameters($env));

        if ($get) {
            $this->setQuery(new Parameters($get));
        }

        if ($post) {
            $this->setPost(new Parameters($post));
        }

        if ($cookie) {
            $this->setCookies(new Parameters($cookie));
        }

        if ($files) {
            // convert PHP $_FILES superglobal
            $files = $this->mapPhpFiles();
            $this->setFiles(new Parameters($files));
        }

        $this->setServer(new Parameters($server));
    }
}
