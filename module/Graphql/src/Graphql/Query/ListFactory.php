<?php
namespace Graphql\Query;

use GraphQl\Type\Definition\Type;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Graphql\Type\TypeFactory;
use Graphql\Data\DataSource;

class ListFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $typeFactory = $this->getTypeFactory($serviceManager);

        $field = [
            'type' => $typeFactory->getType('List'), // The name of the object type
            'args' => [
                'users' => [
                    'name' => 'users',
                    'type' => Type::string(),
                    'description' => 'If omitted, it returns user by id',
                ],
                // 'packages' => [
                //     'name' => 'packages',
                //     'type' => Type::string(),
                //     'description' => 'If omitted, it returns user by name',
                // ],
            ],
            'resolve' => function ($root, $args) {
                DataSource::init();
                // \Zend\Debug\Debug::dump($args);
                $result = DataSource::getUsers();
                return $result;
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
