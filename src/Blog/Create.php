<?php

namespace Blog;

use Framework\Event\EventInterface;
use Framework\Event\EventTrait as Event;
use Framework\Event\Signal\SignalTrait as Signal;
use Framework\View\Model\ServiceTrait as View;
use Framework\View\Model\ModelInterface as ViewModel;
use Framework\Request\RequestInterface as Request;
use Framework\Response\ResponseInterface as Response;

class Create
    implements CreateInterface, EventInterface
{
    /**
     *
     */
    use Event;
    use Signal;
    use View;

    const EVENT = self::CREATE;

    protected $blog;
    protected $request;
    protected $response;
    //protected $viewModel;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request  = $request;
        $this->response = $response;
    }

    /**
     * @return array
     */
    protected function args()
    {
        return [
            ArgsInterface::BLOG      => $this->blog,
            ArgsInterface::EVENT     => $this,
            ArgsInterface::REQUEST   => $this->request,
            ArgsInterface::RESPONSE  => $this->response,
            ArgsInterface::VIEWMODEL => $this->viewModel,
        ];
    }

    /**
     * @param callable $listener
     * @param array $options
     * @return mixed
     */
    public function __invoke(callable $listener, array $options = [])
    {
        $response = $this->signal($listener, $this->args());

        switch(true) {
            default:
                break;
            case $response instanceof BlogInterface:

                $this->blog = $response;

                break;
            case $response instanceof ViewModelInterface:
                /** @var $response ViewModel */

                $this->setViewModel($response);

                break;
        }

        return $response;
    }
}
