<?php
namespace Graphql\Query;

use GraphQl\Type\Definition\Type;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Graphql\Type\TypeFactory;
use Graphql\Data\DataSource;

class PackageFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $typeFactory = $this->getTypeFactory($serviceManager);

        $field = [
            'type' => Type::listOf($typeFactory->getType('Package')), // The name of the object type
            'args' => [
                'id' => [
                    'name' => 'id',
                    'type' => Type::listOf(Type::int()),
                    'description' => 'If omitted, it returns user by id',
                ],
            ],
            'resolve' => function ($root, $args) {
                DataSource::init();
                if (is_null($args['id'])) {
                    $package = DataSource::getPackages();
                }

                if (!is_null($args['id'])) {
                    $package = DataSource::findPackageWhereIn($args['id']);
                }

                return $package;
            }
        ];
        return $field;
    }

    public function getTypeFactory(ServiceLocatorInterface $serviceManager)
    {
        $typeFactory = $serviceManager->get('Graphql\TypeFactory');

        return $typeFactory;
    }
}
