<?php
namespace Graphql\Controller;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

/**
 * GraphQL controller factory
 * @package Graphql
 * @author Juan Pablo Cruz <pablo.cruz@digimobil.es>
 */
class GraphControllerFactory implements FactoryInterface
{
    public function createService(
        ServiceLocatorInterface $serviceManager
    ) {
        $controller = new GraphController($serviceManager->getServiceLocator()->get("Graphql\Schema"));

        return $controller;
    }
}
