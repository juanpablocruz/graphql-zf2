<?php
namespace Graphql\Entity;

use GraphQL\Utils\Utils;

/**
 * Description of package
 *
 * @author miki
 */
class PackageDetail
{
    public $id;
    public $idPqAgente;
    public $package;
    public $idPerfil;
    public $fchRegistro;
    public $fchPago;
    public $fchCaducidad;
    public $precio;
    public $cantWebTotal;
    public $cantImpresoTotal;
    public $cantWebEliminados;
    public $cantImpresoEliminados;
    public $estado;
    public $contrato;
    public $cantPalabLibres;
    public $precioAviso;
    public $semanas;
    public $tipo;
    public $cantFotos;
    public $destaquePortada;
    public $cantAvisoSinFoto;
    public $tienda;

    public function __construct($data)
    {
        Utils::assign($this, $data);
    }
}
