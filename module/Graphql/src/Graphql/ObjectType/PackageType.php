<?php
namespace Graphql\ObjectType;

use GraphQL\Type\Definition\ObjectType;
use Graphql\Type\TypeFactory;
use GraphQL\Type\Definition\Type;

/**
 * Description of User
 *
 * @author alex
 */
class PackageType extends ObjectType
{
    public function __construct(TypeFactory $typeFactory)
    {
        parent::__construct([
            'name' => 'Package',
            'description' => 'A user on my website',
            'fields' => [
                'id' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'nombre' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'precio' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'precioAviso' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantWebs' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantImpresos' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'semanas' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'tipo' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantFotos' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantPalabLibres' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'destaquePortada' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantAvisoSinFoto' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'tienda' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'informacion' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'subSecId' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'codSubseccion' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'dscSubseccion' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'ubiId' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'tarId' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
            ]
        ]);
    }
}
