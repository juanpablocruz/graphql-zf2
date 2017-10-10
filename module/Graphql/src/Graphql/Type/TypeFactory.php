<?php

namespace Graphql\Type;

use GraphQl\Type\Definition\ObjectType;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Graphql\Type\Exception\TypeFactoryException;

/**
 * GraphQL type factory
 * @package Graphql
 * @author Juan Pablo Cruz <pablo.cruz@digimobil.es>
 */
class TypeFactory implements FactoryInterface
{
    protected $serviceManager;
    protected $typeConfig;
    protected $types = [];

    public function getType($name)
    {
        if (!isset($this->typeConfig[$name])) {
            throw new TypeFactoryException();
        }
        if (!isset($this->types[$name])) {
            $this->types[$name] = new $this->typeConfig[$name]($this);
        }

        return $this->types[$name];
    }

    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $this->typeConfig = $typeConfig = $this->getTypeConfig($serviceManager);
        $this->container = $serviceManager;

        return $this;
    }

    protected function getTypeConfig(ServiceLocatorInterface $serviceManager)
    {
        $config = $serviceManager->get('config');

        return $config['graphql']['types'];
    }
}
