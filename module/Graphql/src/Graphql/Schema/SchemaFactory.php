<?php
namespace Graphql\Schema;

use GraphQL\Schema;
use GraphQL\Type\Definition\Type;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SchemaFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $queryType = $this->getQueryType($serviceManager);
        $mutationType = $this->getMutationType($serviceManager);

        $schema = new Schema([
            'query' => $queryType,
            'mutation' => $mutationType
          ]);
        return $schema;
    }

    protected function getQueryType(ServiceLocatorInterface $serviceManager)
    {
        return $serviceManager->get('Graphql\Schema\Query');
    }

    protected function getMutationType(ServiceLocatorInterface $serviceManager)
    {
        return $serviceManager->get('Graphql\Schema\Mutation');
    }
}
