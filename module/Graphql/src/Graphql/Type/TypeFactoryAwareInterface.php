<?php
namespace Graphql\Type;

interface TypeFactoryAwareInterface
{
    public function setTypeFactory(TypeFactory $typeFactory);

    public function getTypeFactory() : TypeFactory;
}
