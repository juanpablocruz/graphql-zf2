<?php
namespace Graphql\Resolver;

use Graphql\Type\Definition\ResolverInfo;

/**
 * Resolver interface
 * @package Graphql
 * @author Juan Pablo Cruz <pablo.cruz@digimobil.es>
 */
interface ResolverInterface
{
    public function __invoke($object, $args, $context, ResolverInfo $info);
}
