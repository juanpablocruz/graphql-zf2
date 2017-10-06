<?php
namespace Graphql\Query;

use GraphQL\Type\Definition\Type;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use Graphql\Type\TypeFactory;
use Graphql\Entity\User;
use Graphql\Data\DataSource;

class UserFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $typeFactory = $this->getTypeFactory($serviceManager);

        $field = [
            'type' => Type::listOf($typeFactory->getType('User')), // The name of the object type
            'args' => [
                'id' => [
                    'name' => 'id',
                    'type' => Type::listOf(Type::int()),
                    'description' => 'If omitted, it returns user by id',
                ],
                /*'name' => [
                    'name' => 'name',
                    'type' => Type::string(),
                    'description' => 'If omitted, it returns user by name',
                ],
                'email' => [
                    'name' => 'email',
                    'type' => Type::string(),
                    'description' => 'If omitted, it returns user by email',
                ],*/
            ],
            'resolve' => function ($root, $args) {
                DataSource::init();
                if (is_null($args['id'])) {
                    $user = DataSource::getUsers();
                }

                if (!is_null($args['id'])) {
                    $user = DataSource::findUserWhereIn($args['id']);
                }
                return $user;
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
