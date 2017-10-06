<?php
namespace Graphql\Mutation;

use GraphQL\Type\Definition\Type;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use Graphql\Type\TypeFactory;
use Graphql\Data\DataSource;

class RegisterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $typeFactory = $this->getTypeFactory($serviceManager);

        $field = [
            'type' => $typeFactory->getType('Register'), // The name of the object type
            'args' => [
                'firstName' => [
                    'name' => 'firstName',
                    'type' => Type::string(),
                    'description' => 'If omitted, it returns user by name',
                ],
                'email' => [
                    'name' => 'email',
                    'type' => Type::string(),
                    'description' => 'If omitted, it returns user by email',
                ],
            ],
            'resolve' => function ($root, $args) {
                // your resolve function
                DataSource::init();
                // \Zend\Debug\Debug::dump($args);
                $id = DataSource::addUser($args["firstName"], $args["email"]);
                return DataSource::findUser($id);
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
