<?php
namespace Graphql\Type;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\InitializerInterface;

/**
 * GraphQL type factory initializer
 * @package Graphql
 * @author Juan Pablo Cruz <pablo.cruz@digimobil.es>
 */
class TypeFactoryInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof TypeFactoryAwareInterface) {
            $instance->setTypeFactory($sm->get('Graphql\TypeFactory'));
        }
    }
}
