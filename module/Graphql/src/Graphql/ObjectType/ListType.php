<?php
namespace Graphql\ObjectType;

use GraphQL\Type\Definition\ObjectType;
use GraphQl\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Graphql\Type\TypeFactory;
use Graphql\Data\DataSource;
use Graphql\Entity\User;
use Graphql\Entity\Package;

class ListType extends ObjectType
{
    public function __construct(TypeFactory $typeFactory)
    {
        parent::__construct([
          'name' => 'List',
          'description' => 'A user on my website',
          'fields' => [
              'users' => [
                  'type' => Type::listOf($typeFactory->getType('User')),
                  'description' => 'Id of the user',
              ],
              'packages' => [
                  'type' => Type::listOf($typeFactory->getType('Package')),
                  'description' => 'Nombre de la descripcion',
              ],
              'apellido' => [
                  'type' => Type::string(),
                  'description' => 'Email of the user',
              ],
          ],
          'resolveField' => function ($value, $args, $context, ResolveInfo $info) {
              $method = 'resolve' . ucfirst($info->fieldName);
              if (method_exists($this, $method)) {
                  return $this->{$method}($value, $args, $context, $info);
              } else {
                  return $value->{$info->fieldName};
              }
          }
        ]);
    }

    public function resolveUsers()
    {
        return DataSource::getUsers();
    }
    public function resolvePackages()
    {
        return DataSource::getPackages();
    }
}
