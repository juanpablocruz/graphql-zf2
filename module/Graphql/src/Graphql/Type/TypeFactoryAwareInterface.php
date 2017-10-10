<?php
namespace Graphql\Type;

/**
 * GraphQL type factory aware interface
 * @package Graphql
 * @author Juan Pablo Cruz <pablo.cruz@digimobil.es>
 */
interface TypeFactoryAwareInterface
{
    public function setTypeFactory(TypeFactory $typeFactory);

    public function getTypeFactory() : TypeFactory;
}
