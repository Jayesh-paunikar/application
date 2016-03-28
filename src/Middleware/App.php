<?php
/**
 *
 */

namespace Middleware;

use Mvc5\Plugin;
use Request\Psr\Request;
use Response\Psr\Response;

class App
{
    /**
     *
     */
    use Plugin;

    /**
     * @var array
     */
    protected $stack;

    /**
     * @param array $stack
     */
    public function __construct(array $stack = [])
    {
        $this->stack = $stack;
    }

    /**
     * @return \Closure
     */
    protected function next()
    {
        return function(Request $request, Response $response) {
            return ($next = next($this->stack)) ? $this->call($next, [$request, $response, $this->next()]) : $response;
        };
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return callable|mixed|null|object
     */
    public function __invoke(Request $request, Response $response)
    {
        return $this->call(current($this->stack), [$request, $response, $this->next()]);
    }
}
