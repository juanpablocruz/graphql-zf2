<?php
namespace Graphql\Resolver;

use Graphql\Type\Definition\ResolverInfo;

interface ResolverInterface
{
    public function __invoke($object, $args, $context, ResolverInfo $info);
}
