<?php
namespace Graphql\Type;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\InitializerInterface;

class TypeFactoryInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof TypeFactoryAwareInterface) {
            $instance->setTypeFactory($sm->get('Graphql\TypeFactory'));
        }
    }
}
