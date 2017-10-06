<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
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
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
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

        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
          ),
          'factories' => [
            'Graphql\Controller\Graph' => 'Graphql\Controller\GraphControllerFactory'
          ],
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

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

    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
