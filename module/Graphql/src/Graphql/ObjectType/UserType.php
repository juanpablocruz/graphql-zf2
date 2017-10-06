<?php
namespace Graphql\ObjectType;

use GraphQL\Type\Definition\ObjectType;
use Graphql\Type\TypeFactory;
use GraphQL\Type\Definition\Type;

class UserType extends ObjectType
{
    public function __construct(TypeFactory $typeFactory)
    {
        parent::__construct([
            'name' => 'User',
            'description' => 'A user on my website',
            'fields' => [
                'id' => [
                    'type' => Type::string(),
                    'description' => 'Id of the user'
                ],
                'firstName' => [
                    'type' => Type::string(),
                    'description' => 'First Name of the user',
                ],
                'lastName' => [
                    'type' => Type::string(),
                    'description' => 'Last Name of the user',
                ],
                'email' => [
                    'type' => Type::string(),
                    'description' => 'Email of the user',
                ],
//                'myObjectType' => [
//                    'type' => $typeFactory->getType('nameOfMyObjectType'),
//                    'description' => 'This field contains my custom object type',
//                ],
                'bestFriend' => [
                    'type' => $this, // If you want to use the object type itself set it to $this to avoid a circular dependency
                    'description' => 'Best friend of the user',
                ],
            ]
        ]);
    }
}
