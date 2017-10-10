<?php
return [
    'router' => [
        'routes' => [
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'graph' => [
              'type' => 'Literal',
              'options' => [
                'route' => '/graph',
                'defaults' => [
                  'controller' => 'Graphql\Controller\Graph',
                  'action' => 'graph',
                  ],
                ],
              ],
        ],
    ],
    
    'service_manager' => [
        'invokables' => [
            // Graphql object types
            'Graphql\ObjectType\UserType' => 'Graphql\ObjectType\UserType',
            'Graphql\ObjectType\PackageType' => 'Graphql\ObjectType\PackageType',
            'Graphql\ObjectType\PackageDetailType' => 'Graphql\ObjectType\PackageDetailType',
            'Graphql\ObjectType\ListType' => 'Graphql\ObjectType\ListType',
        ],
        'factories' => [
            // Graphql query
            'Graphql\Query\User' => 'Graphql\Query\UserFactory',
            'Graphql\Query\List' => 'Graphql\Query\ListFactory',
            'Graphql\Query\Package' => 'Graphql\Query\PackageFactory',
            'Graphql\Query\PackageDetail' => 'Graphql\Query\PackageDetailFactory',
            'Graphql\Mutation\Register' => 'Graphql\Mutation\RegisterFactory',
            'Graphql\TypeFactory' => 'Graphql\Type\TypeFactory',
            'Graphql\Schema'      => 'Graphql\Schema\SchemaFactory',
            'Graphql\Schema\Query' => 'Graphql\Schema\QueryFactory',
            'Graphql\Schema\Mutation' => 'Graphql\Schema\MutationFactory',
        ],
        'initializers' => [
            // Graphql type initializer
            'Graphql\Type\TypeFactoryInitializer',
        ],
        'shared' => [
            // Graphql type factory
            'Graphql\TypeFactory' => true,
        ],
    ],

    'controllers' => [
          'factories' => [
            'Graphql\Controller\Graph' => 'Graphql\Controller\GraphControllerFactory'
          ],
    ],

    'graphql' => [
        'query' => [
            'fields' => [
                'list' => [
                    'service' => 'Graphql\Query\List',
                ],
                'user' => [
                    'service' => 'Graphql\Query\User',
                ],
                'package' => [
                    'service' => 'Graphql\Query\Package',
                ],
                'packageDetail' => [
                    'service' => 'Graphql\Query\PackageDetail',
                ],
            ],
        ],
        'mutation' => [
            'fields' => [
                'registerUser' => [
                    'service' => 'Graphql\Mutation\Register',
                ],
            ],
        ],
        'types' => [
            'List' => 'Graphql\ObjectType\ListType',
            'User' => 'Graphql\ObjectType\UserType',
            'Package' => 'Graphql\ObjectType\PackageType',
            'PackageDetail' => 'Graphql\ObjectType\PackageDetailType',
            'Register' => 'Graphql\ObjectType\Registertype',
        ],
    ],
];
