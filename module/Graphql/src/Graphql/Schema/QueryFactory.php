<?php
namespace Graphql\Schema;

use GraphQl\Type\Definition\ObjectType;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

/**
 * GraphQL query factory
 * @package Graphql
 * @author Juan Pablo Cruz <pablo.cruz@digimobil.es>
 */
class QueryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $queryConfig = $this->getQueryConfig($serviceManager);

        $queryTypeConfig = [
            'name' => 'Query',
            'fields' => [],
        ];

        foreach ($queryConfig['fields'] as $name => $field) {
            $queryTypeConfig['fields'][$name] = $serviceManager->get($field['service']);

            if (!isset($queryTypeConfig['fields'][$name]['resolve'])) {
                $queryTypeConfig['fields'][$name]['resolve'] = $serviceManager->get($field['resolver']);
            }
        }

        $queryType = new ObjectType($queryTypeConfig);
        return $queryType;
    }

    protected function getQueryConfig(ServiceLocatorInterface $serviceManager)
    {
        $config = $serviceManager->get('config');

        return $config['graphql']['query'];
    }
}
