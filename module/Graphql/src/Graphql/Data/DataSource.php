<?php
namespace Graphql\Data;

use Graphql\Entity\User;
use Graphql\Entity\Package;
use Graphql\Entity\PackageDetail;

/**
 * Class DataSource
 *
 * This is just a simple in-memory data holder for the sake of example.
 * Data layer for real app may use Doctrine or query the database directly (e.g. in CQRS style)
 *
 * @package GraphQL\Examples\Blog
 */
class DataSource
{
    private static $users = [];
    private static $packages = [];
    private static $packageDetails = [];
    private static $stories = [];
    private static $storyLikes = [];
    private static $comments = [];
    private static $storyComments = [];
    private static $commentReplies = [];
    private static $storyMentions = [];

    public static function init()
    {
        self::$users = [
            '1' => new User([
                'id' => '1',
                'email' => 'john@example.com',
                'firstName' => 'John',
                'lastName' => 'Doe'
            ]),
            '2' => new User([
                'id' => '2',
                'email' => 'jane@example.com',
                'firstName' => 'Jane',
                'lastName' => 'Doe'
            ]),
            '3' => new User([
                'id' => '3',
                'email' => 'alex@example.com',
                'firstName' => 'Alex',
                'lastName' => 'Ramirez'
            ]),
        ];

        self::$packages = array(
          new Package(array('id' => '1','nombre' => 'Paquete Agente Básico','precio' => '433.00','precioAviso' => '36.07','cantWebs' => '25','cantImpresos' => '12','semanas' => '4','tipo' => '3','cantFotos' => '24','cantPalabLibres' => '11','destaquePortada' => '2','cantAvisoSinFoto' => '12','tienda' => '1','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 28 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 28 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '2','nombre' => 'Paquete Agente Plus','precio' => '681.50','precioAviso' => '34.08','cantWebs' => '35','cantImpresos' => '20','semanas' => '6','tipo' => '3','cantFotos' => '24','cantPalabLibres' => '11','destaquePortada' => '2','cantAvisoSinFoto' => '20','tienda' => '1','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 42 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 42 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '3','nombre' => 'Paquete Agente Full','precio' => '962.00','precioAviso' => '32.08','cantWebs' => '60','cantImpresos' => '30','semanas' => '6','tipo' => '3','cantFotos' => '24','cantPalabLibres' => '11','destaquePortada' => '2','cantAvisoSinFoto' => '30','tienda' => '1','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 42 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 42 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '4','nombre' => 'Paquete Aviso Bonificado','precio' => '0.00','precioAviso' => '0.00','cantWebs' => '1','cantImpresos' => '0','semanas' => '4','tipo' => '1','cantFotos' => '24','cantPalabLibres' => '0','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0','informacion' => '','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '5','nombre' => 'Paquete Simple Web','precio' => '105.00','precioAviso' => '15.00','cantWebs' => '10','cantImpresos' => '0','semanas' => '4','tipo' => '2','cantFotos' => '24','cantPalabLibres' => '0','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más) vista de su categoría en el Perú. Los paquetes de avisos web, duran 28 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 28 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '16234','codSubseccion' => 'WUR-AS','dscSubseccion' => 'AGENTE SIMPLE','ubiId' => '27454','tarId' => '72087')),
          new Package(array('id' => '6','nombre' => 'Paquete Básico Web','precio' => '135.00','precioAviso' => '15.00','cantWebs' => '15','cantImpresos' => '0','semanas' => '4','tipo' => '2','cantFotos' => '24','cantPalabLibres' => '0','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 28 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 28 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '16235','codSubseccion' => 'WUR-AB','dscSubseccion' => 'AGENTE BASICO','ubiId' => '27451','tarId' => '72084')),
          new Package(array('id' => '7','nombre' => 'Paquete Plus Web','precio' => '150.00','precioAviso' => '15.00','cantWebs' => '25','cantImpresos' => '0','semanas' => '4','tipo' => '2','cantFotos' => '24','cantPalabLibres' => '0','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 28 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 28 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '16237','codSubseccion' => 'WUR-AP','dscSubseccion' => 'AGENTE PLUS','ubiId' => '27453','tarId' => '72086')),
          new Package(array('id' => '8','nombre' => 'Paquete Full Web','precio' => '180.00','precioAviso' => '15.00','cantWebs' => '40','cantImpresos' => '0','semanas' => '4','tipo' => '2','cantFotos' => '24','cantPalabLibres' => '0','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 28 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 28 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '16236','codSubseccion' => 'WUR-AF','dscSubseccion' => 'AGENTE FULL','ubiId' => '27452','tarId' => '72085')),
          new Package(array('id' => '9','nombre' => 'Paquete Agente Simple','precio' => '304.50','precioAviso' => '38.05','cantWebs' => '15','cantImpresos' => '8','semanas' => '4','tipo' => '3','cantFotos' => '24','cantPalabLibres' => '11','destaquePortada' => '2','cantAvisoSinFoto' => '8','tienda' => '1','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 28 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 28 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '10','nombre' => 'Paquete Agente Básico + Adicional','precio' => '598.00','precioAviso' => '49.85','cantWebs' => '25','cantImpresos' => '12','semanas' => '4','tipo' => '3','cantFotos' => '24','cantPalabLibres' => '17','destaquePortada' => '2','cantAvisoSinFoto' => '12','tienda' => '1','informacion' => '','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '11','nombre' => 'Paquete Agente Plus + Adicional','precio' => '957.00','precioAviso' => '47.85','cantWebs' => '35','cantImpresos' => '20','semanas' => '6','tipo' => '3','cantFotos' => '24','cantPalabLibres' => '17','destaquePortada' => '2','cantAvisoSinFoto' => '20','tienda' => '1','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos,) siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 42 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 42 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '12','nombre' => 'Paquete Agente Full + Adicional','precio' => '1375.00','precioAviso' => '45.84','cantWebs' => '60','cantImpresos' => '30','semanas' => '6','tipo' => '3','cantFotos' => '24','cantPalabLibres' => '17','destaquePortada' => '2','cantAvisoSinFoto' => '30','tienda' => '1','informacion' => '<p>Urbania web es vista por más de 315,000 usuarios únicos, siendo la página web más vista de su categoría en el Perú. Los paquetes de avisos web, duran 42 días y son acumulables, es decir puede tener varios paquetes activos al mismo tiempo. </p><p>Pasados los 42 días, el paquete de avisos web caducará. El costo promedio del aviso es de S/.36.00 Nuevos Soles, inc. IGV. Dentro de este paquete avisos web. El paquete de avisos comprado, le ofrece una tienda web, lo cual es una gran oportunidad, para posicionar su marca en el mercado.</p>','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '13','nombre' => 'Paquete Agente Simple + Adicional','precio' => '414.50','precioAviso' => '51.83','cantWebs' => '15','cantImpresos' => '8','semanas' => '4','tipo' => '3','cantFotos' => '24','cantPalabLibres' => '17','destaquePortada' => '2','cantAvisoSinFoto' => '8','tienda' => '1','informacion' => '','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0')),
          new Package(array('id' => '14','nombre' => 'Paquete Hol Simple Web','precio' => '0.00','precioAviso' => '0.00','cantWebs' => '10','cantImpresos' => '0','semanas' => '4','tipo' => '2','cantFotos' => '24','cantPalabLibres' => '0','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0','informacion' => '','subSecId' => '0','codSubseccion' => '','dscSubseccion' => '','ubiId' => '0','tarId' => '0'))
        );

        self::$packageDetails = array(
          new PackageDetail(array('id' => '11203','idPqAgente' => '6','idPerfil' => '357730','fchRegistro' => '2017-06-06 18:16:48','fchPago' => '2017-06-06 18:17:01','fchCaducidad' => '2017-07-04 18:17:01','precio' => '135.00','cantWebTotal' => '15','cantImpresoTotal' => '0','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '12211980','cantPalabLibres' => '0','precioAviso' => '15.00','semanas' => '4','tipo' => '2','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0')),
          new PackageDetail(array('id' => '11202','idPqAgente' => '5','idPerfil' => '357635','fchRegistro' => '2016-01-12 16:04:42','fchPago' => '2016-01-12 16:04:42','fchCaducidad' => '2016-02-09 16:04:42','precio' => '105.00','cantWebTotal' => '10','cantImpresoTotal' => '0','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '0','contrato' => null,'cantPalabLibres' => '0','precioAviso' => '15.00','semanas' => '4','tipo' => '2','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0')),
          new PackageDetail(array('id' => '11201','idPqAgente' => '1','idPerfil' => '357635','fchRegistro' => '2016-01-12 16:00:05','fchPago' => '2016-01-12 16:00:05','fchCaducidad' => '2016-02-09 16:00:05','precio' => '433.00','cantWebTotal' => '25','cantImpresoTotal' => '12','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '0','contrato' => null,'cantPalabLibres' => '11','precioAviso' => '36.07','semanas' => '4','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '12','tienda' => '1')),
          new PackageDetail(array('id' => '11200','idPqAgente' => '9','idPerfil' => '357632','fchRegistro' => '2016-01-11 20:42:04','fchPago' => '2016-01-11 20:45:53','fchCaducidad' => '2016-02-08 20:45:53','precio' => '304.50','cantWebTotal' => '15','cantImpresoTotal' => '8','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '32688','cantPalabLibres' => '11','precioAviso' => '38.05','semanas' => '4','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '8','tienda' => '1')),
          new PackageDetail(array('id' => '11198','idPqAgente' => '9','idPerfil' => '357614','fchRegistro' => '2016-01-05 15:03:04','fchPago' => '2016-01-05 15:03:12','fchCaducidad' => '2016-02-02 15:03:12','precio' => '304.50','cantWebTotal' => '15','cantImpresoTotal' => '8','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '32658','cantPalabLibres' => '11','precioAviso' => '38.05','semanas' => '4','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '8','tienda' => '1')),
          new PackageDetail(array('id' => '11197','idPqAgente' => '9','idPerfil' => '357611','fchRegistro' => '2016-01-04 16:01:10','fchPago' => '2016-01-04 16:01:10','fchCaducidad' => '2016-02-01 16:01:10','precio' => '304.50','cantWebTotal' => '15','cantImpresoTotal' => '8','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '0','contrato' => null,'cantPalabLibres' => '11','precioAviso' => '38.05','semanas' => '4','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '8','tienda' => '1')),
          new PackageDetail(array('id' => '11194','idPqAgente' => '6','idPerfil' => '350999','fchRegistro' => '2015-12-30 17:54:28','fchPago' => '2015-12-30 17:56:29','fchCaducidad' => '2016-01-27 17:56:29','precio' => '135.00','cantWebTotal' => '15','cantImpresoTotal' => '0','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '10630359','cantPalabLibres' => '0','precioAviso' => '15.00','semanas' => '4','tipo' => '2','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0')),
          new PackageDetail(array('id' => '11192','idPqAgente' => '3','idPerfil' => '357558','fchRegistro' => '2015-12-29 21:02:31','fchPago' => '2015-12-29 21:02:38','fchCaducidad' => '2016-02-09 21:02:38','precio' => '962.00','cantWebTotal' => '60','cantImpresoTotal' => '30','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '32656','cantPalabLibres' => '11','precioAviso' => '32.08','semanas' => '6','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '30','tienda' => '1')),
          new PackageDetail(array('id' => '11190','idPqAgente' => '13','idPerfil' => '357727','fchRegistro' => '2015-12-23 23:02:25','fchPago' => '2015-12-23 23:04:36','fchCaducidad' => '2016-01-20 23:04:36','precio' => '414.50','cantWebTotal' => '15','cantImpresoTotal' => '8','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '32653','cantPalabLibres' => '17','precioAviso' => '51.83','semanas' => '4','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '8','tienda' => '1')),
          new PackageDetail(array('id' => '11189','idPqAgente' => '4','idPerfil' => '357585','fchRegistro' => '2015-12-21 16:42:21','fchPago' => '2015-12-21 16:42:21','fchCaducidad' => '2016-01-18 16:42:21','precio' => '0.00','cantWebTotal' => '1','cantImpresoTotal' => '0','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => null,'cantPalabLibres' => '0','precioAviso' => '0.00','semanas' => '4','tipo' => '1','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0')),
          new PackageDetail(array('id' => '11188','idPqAgente' => '2','idPerfil' => '357567','fchRegistro' => '2015-12-17 18:49:20','fchPago' => '2015-12-17 18:53:17','fchCaducidad' => '2016-01-28 18:53:17','precio' => '681.50','cantWebTotal' => '35','cantImpresoTotal' => '20','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '32642','cantPalabLibres' => '11','precioAviso' => '34.08','semanas' => '6','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '20','tienda' => '1')),
          new PackageDetail(array('id' => '11186','idPqAgente' => '6','idPerfil' => '350999','fchRegistro' => '2015-12-10 16:22:15','fchPago' => '2015-12-10 16:25:22','fchCaducidad' => '2016-01-07 16:25:22','precio' => '135.00','cantWebTotal' => '15','cantImpresoTotal' => '0','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '10629647','cantPalabLibres' => '0','precioAviso' => '15.00','semanas' => '4','tipo' => '2','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0')),
          new PackageDetail(array('id' => '11185','idPqAgente' => '6','idPerfil' => '350999','fchRegistro' => '2015-12-10 16:22:14','fchPago' => '2015-12-10 16:22:14','fchCaducidad' => '2016-01-07 16:22:14','precio' => '135.00','cantWebTotal' => '15','cantImpresoTotal' => '0','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '0','contrato' => null,'cantPalabLibres' => '0','precioAviso' => '15.00','semanas' => '4','tipo' => '2','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0')),
          new PackageDetail(array('id' => '11184','idPqAgente' => '10','idPerfil' => '350999','fchRegistro' => '2015-12-10 15:36:53','fchPago' => '2015-12-10 15:39:35','fchCaducidad' => '2016-01-07 15:39:35','precio' => '598.00','cantWebTotal' => '25','cantImpresoTotal' => '12','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '32634','cantPalabLibres' => '17','precioAviso' => '49.85','semanas' => '4','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '12','tienda' => '1')),
          new PackageDetail(array('id' => '11182','idPqAgente' => '12','idPerfil' => '350999','fchRegistro' => '2015-12-10 14:49:51','fchPago' => '2015-12-10 14:56:42','fchCaducidad' => '2016-01-21 14:56:42','precio' => '1375.00','cantWebTotal' => '60','cantImpresoTotal' => '30','cantWebEliminados' => '0','cantImpresoEliminados' => '0','estado' => '1','contrato' => '32633','cantPalabLibres' => '17','precioAviso' => '45.84','semanas' => '6','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '30','tienda' => '1')),
          new PackageDetail(array('id' => '11181','idPqAgente' => '9','idPerfil' => '357567','fchRegistro' => '2015-12-07 21:28:39','fchPago' => '2015-12-07 21:28:48','fchCaducidad' => '2015-12-21 14:00:00','precio' => '304.50','cantWebTotal' => '15','cantImpresoTotal' => '8','cantWebEliminados' => '13','cantImpresoEliminados' => '6','estado' => '2','contrato' => '32631','cantPalabLibres' => '11','precioAviso' => '38.05','semanas' => '4','tipo' => '3','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '8','tienda' => '1')),
          new PackageDetail(array('id' => '11180','idPqAgente' => '5','idPerfil' => '357567','fchRegistro' => '2015-12-07 21:08:58','fchPago' => '2015-12-07 21:12:16','fchCaducidad' => '2015-12-21 14:00:00','precio' => '105.00','cantWebTotal' => '10','cantImpresoTotal' => '0','cantWebEliminados' => '10','cantImpresoEliminados' => '0','estado' => '2','contrato' => '10629618','cantPalabLibres' => '0','precioAviso' => '15.00','semanas' => '4','tipo' => '2','cantFotos' => '24','destaquePortada' => '2','cantAvisoSinFoto' => '0','tienda' => '0')),
        );

        self::$storyComments = [
            '1' => ['100', '200', '300'],
            '2' => ['400', '500']
        ];

        self::$commentReplies = [
            '100' => ['110', '120', '130'],
            '110' => ['111', '112', '113', '114', '115', '116', '117'],
        ];

        self::$storyMentions = [
            '1' => [
                self::$users['2']
            ],
            '2' => [
                // self::$stories['1'],
                self::$users['3']
            ]
        ];
    }

    public static function addUser($name, $email)
    {
        $id = count(self::$users);
        array_push(self::$users, new User(["id" => ++$id, "email" => $email, "firstName" => $name, "lastName" => ""]));
        return $id;
    }

    public static function findUser($id)
    {
        return isset(self::$users[$id]) ? self::$users[$id] : null;
    }

    public static function findUserWhereIn(array $idUsers)
    {
        $result = [];
        foreach ($idUsers as $idUser) {
            $user = isset(self::$users[$idUser]) ? self::$users[$idUser] : null;
            array_push($result, $user);
        }
        return $result;
    }

    public static function getUsers()
    {
        return self::$users;
    }

    public static function findPackage($id)
    {
        return isset(self::$packages[$id]) ? self::$packages[$id] : null;
    }

    public static function findPackageWhereIn(array $idPackages)
    {
        $result = [];
        foreach ($idPackages as $idPackage) {
            $package = isset(self::$packages[$idPackage]) ? self::$packages[$idPackage] : null;
            array_push($result, $package);
        }
        return $result;
    }

    public static function getPackages()
    {
        return self::$packages;
    }

    public static function findPackageDetail($idPackageDetail)
    {
        return isset(self::$packageDetails[$idPackageDetail]) ? self::$packageDetails[$idPackageDetail] : null;
    }

    public static function findPackageDetailWhereIn(array $idPackageDetails)
    {
        $result = [];
        foreach ($idPackageDetails as $idPackageDetail) {
            $packageDetail = isset(self::$packageDetails[$idPackageDetail]) ? self::$packageDetails[$idPackageDetail] : null;
            array_push($result, $packageDetail);
        }
        return $result;
    }

    public static function getPackageDetails()
    {
        return self::$packageDetails;
    }

    public static function findStory($id)
    {
        return isset(self::$stories[$id]) ? self::$stories[$id] : null;
    }

    public static function findComment($id)
    {
        return isset(self::$comments[$id]) ? self::$comments[$id] : null;
    }

    public static function findLastStoryFor($authorId)
    {
        $storiesFound = array_filter(self::$stories, function (Story $story) use ($authorId) {
            return $story->authorId == $authorId;
        });
        return !empty($storiesFound) ? $storiesFound[count($storiesFound) - 1] : null;
    }

    public static function findLikes($storyId, $limit)
    {
        $likes = isset(self::$storyLikes[$storyId]) ? self::$storyLikes[$storyId] : [];
        $result = array_map(
            function ($userId) {
                return self::$users[$userId];
            },
            $likes
        );
        return array_slice($result, 0, $limit);
    }

    public static function isLikedBy($storyId, $userId)
    {
        $subscribers = isset(self::$storyLikes[$storyId]) ? self::$storyLikes[$storyId] : [];
        return in_array($userId, $subscribers);
    }

    public static function getUserPhoto($userId, $size)
    {
        return new Image([
            'id' => $userId,
            'type' => Image::TYPE_USERPIC,
            'size' => $size,
            'width' => rand(100, 200),
            'height' => rand(100, 200)
        ]);
    }

    public static function findLatestStory()
    {
        return array_pop(self::$stories);
    }

    public static function findStories($limit, $afterId = null)
    {
        $start = $afterId ? (int) array_search($afterId, array_keys(self::$stories)) + 1 : 0;
        return array_slice(array_values(self::$stories), $start, $limit);
    }

    public static function findComments($storyId, $limit = 5, $afterId = null)
    {
        $storyComments = isset(self::$storyComments[$storyId]) ? self::$storyComments[$storyId] : [];

        $start = isset($after) ? (int) array_search($afterId, $storyComments) + 1 : 0;
        $storyComments = array_slice($storyComments, $start, $limit);

        return array_map(
            function ($commentId) {
                return self::$comments[$commentId];
            },
            $storyComments
        );
    }

    public static function findReplies($commentId, $limit = 5, $afterId = null)
    {
        $commentReplies = isset(self::$commentReplies[$commentId]) ? self::$commentReplies[$commentId] : [];

        $start = isset($after) ? (int) array_search($afterId, $commentReplies) + 1: 0;
        $commentReplies = array_slice($commentReplies, $start, $limit);

        return array_map(
            function ($replyId) {
                return self::$comments[$replyId];
            },
            $commentReplies
        );
    }

    public static function countComments($storyId)
    {
        return isset(self::$storyComments[$storyId]) ? count(self::$storyComments[$storyId]) : 0;
    }

    public static function countReplies($commentId)
    {
        return isset(self::$commentReplies[$commentId]) ? count(self::$commentReplies[$commentId]) : 0;
    }

    public static function findStoryMentions($storyId)
    {
        return isset(self::$storyMentions[$storyId]) ? self::$storyMentions[$storyId] :[];
    }
}
