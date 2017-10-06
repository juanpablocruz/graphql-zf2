<?php
namespace Graphql\ObjectType;

use GraphQL\Type\Definition\Type;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Graphql\Type\TypeFactory;
use GraphQL\Type\Definition\ObjectType;

class Registertype extends ObjectType
{
    public function __construct(TypeFactory $typeFactory)
    {
        parent::__construct([
            'name' => 'Register',
            'description' => 'A user on my website',
            'fields' => [
                'id' => [
                    'type' => Type::string(),
                    'description' => 'Id of the user'
                ],
                'firstName' => [
                    'type' => Type::string(),
                    'description' => 'Nombre de la descripcion',
                ],
                'email' => [
                    'type' => Type::string(),
                    'description' => 'Email of the user',
                ],

            ]
        ]);
    }
}
