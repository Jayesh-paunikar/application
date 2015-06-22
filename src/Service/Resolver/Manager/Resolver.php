<?php
/**
 *
 */

namespace Service\Resolver\Manager;

use Service\Config\Manager\ServiceManager;
use Mvc5\Service\Provider\ServiceProvider;
use Mvc5\Service\Resolver\Resolvable;
use Mvc5\Service\Resolver\Provider;

class Resolver
    implements Manager, ServiceProvider
{
    /**
     *
     */
    use Provider;

    /**
     * @param Resolvable $service
     * @return mixed
     */
    public function __invoke(Resolvable $service)
    {
        if (!$service instanceof ServiceManager) {
            return $service;
        }

        $manager = $this->create($service->config());

        $manager->aliases($this->param('alias'));
        $manager->configuration($this->config());
        $manager->events($this->param('events'));
        $manager->services($this->param('services'));

        return $manager;
    }
}
