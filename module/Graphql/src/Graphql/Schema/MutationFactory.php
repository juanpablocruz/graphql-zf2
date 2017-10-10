<?php
namespace Graphql\Schema;

use GraphQl\Type\Definition\ObjectType;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

/**
 * GraphQL mutation factory
 * @package Graphql
 * @author Juan Pablo Cruz <pablo.cruz@digimobil.es>
 */
class MutationFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $mutationConfig = $this->getMutationConfig($serviceManager);

        $mutationTypeConfig = [
            'name' => 'Mutation',
            'fields' => [],
        ];

        foreach ($mutationConfig['fields'] as $name => $field) {
            $mutationTypeConfig['fields'][$name] = $serviceManager->get($field['service']);

            if (!isset($mutationTypeConfig['fields'][$name]['resolve'])) {
                $mutationTypeConfig['fields'][$name]['resolve'] = $serviceManager->get($field['resolver']);
            }
        }

        $mutationType = new ObjectType($mutationTypeConfig);
        return $mutationType;
    }

    protected function getMutationConfig(ServiceLocatorInterface $serviceManager)
    {
        $config = $serviceManager->get('config');

        return $config['graphql']['mutation'];
    }
}
