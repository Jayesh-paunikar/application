<?php

namespace Application\Home;

use Framework\Controller\Controller\EventInterface;
use Framework\View\Model\ServiceTrait as ViewModel;
use Framework\View\Model\ModelInterface as ViewModelInterface;
use Framework\Request\RequestInterface;
use Framework\Response\ResponseInterface;

class Controller
    implements ControllerInterface
{
    /**
     *
     */
    use ViewModel;

    /**
     * @param EventInterface $event
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return ViewModelInterface
     */
    public function __invoke(EventInterface $event, RequestInterface $request, ResponseInterface $response)
    {
        return $this->viewModel();
    }
}
