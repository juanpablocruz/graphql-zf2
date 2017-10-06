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
class PackageDetailType extends ObjectType
{
    public function __construct(TypeFactory $typeFactory)
    {
        parent::__construct([
            'name' => 'PackageDetail',
            'description' => 'A user on my website',
            'fields' => [
                'id' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'idPqAgente' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'package' => [
                                    'type' => Type::listOf($typeFactory->getType('Package')),
                                    'description' => 'This field contains my custom object type',
                                ],
                'idPerfil' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'fchRegistro' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'fchPago' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'fchCaducidad' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'precio' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantWebTotal' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantImpresoTotal' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantWebEliminados' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantImpresoEliminados' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'estado' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'contrato' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'cantPalabLibres' => [
                    'type' => Type::string(),
                    'description' => 'Description of field'
                ],
                'precioAviso' => [
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
        ]
        ]);
    }
}
