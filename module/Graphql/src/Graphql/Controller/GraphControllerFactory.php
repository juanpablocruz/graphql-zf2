<?php
namespace Graphql\Controller;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class GraphControllerFactory implements FactoryInterface
{
    public function createService(
        ServiceLocatorInterface $serviceManager
    ) {
        $controller = new GraphController($serviceManager->getServiceLocator()->get("Graphql\Schema"));

        return $controller;
    }
}
