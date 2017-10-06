<?php
namespace Graphql\Query;

use GraphQl\Type\Definition\Type;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Graphql\Type\TypeFactory;
use Graphql\Data\DataSource;

class PackageDetailFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $typeFactory = $this->getTypeFactory($serviceManager);

        $field = [
           'type' => Type::listOf($typeFactory->getType('PackageDetail')), // The name of the object type
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
                   $packageDetails = DataSource::getPackageDetails();
               }
               if (!is_null($args['id'])) {
                   $packageDetails = DataSource::findPackageDetailWhereIn($args['id']);
                   foreach ($packageDetails as $key => $packageDetail) {
                       $packageDetails[$key]->package = DataSource::findPackageWhereIn([$packageDetail->idPqAgente]);
                   }
               }

               return $packageDetails;
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
