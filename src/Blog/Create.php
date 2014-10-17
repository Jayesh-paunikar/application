<?php

namespace Blog;

use Framework\Event\EventInterface;
use Framework\Event\EventTrait as Event;
use Framework\View\Model\ServiceTrait as View;
use Framework\View\Model\ModelInterface as ViewModel;
use Request\RequestInterface as Request;
use Response\ResponseInterface as Response;
use Framework\Service\Resolver\SignalTrait as Signal;

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
            ArgsInterface::BLOG       => $this->blog,
            ArgsInterface::EVENT      => $this,
            ArgsInterface::REQUEST    => $this->request,
            ArgsInterface::RESPONSE   => $this->response,
            ArgsInterface::VIEW_MODEL => $this->viewModel
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
