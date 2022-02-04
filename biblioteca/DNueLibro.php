<?php
$fecha = date('Y-m-d');
$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
$nuevafechaYear = strtotime ( '+1 year' , strtotime ( $fecha ) ) ;

$FechaActual = date ( 'Y-m-d' , $nuevafecha );
$FechaMaxima = date ( 'Y-m-d' , $nuevafechaYear );
include('../dbconexion.php');

/*

$dtitulo = $_POST['vtitulo'];

$dimagen = addslashes(file_get_contents($_FILES['vimagen']['tmp_name']));

$dautor = $_POST['vautor'];
$dgenero = $_POST['vgenero'];
$deditorial = $_POST['veditorial'];
$dubicacion = $_POST['vubicacion'];
$dejemplar = $_POST['vejemplar'];


*/
//$dtitulo = $_POST['txttitulo'];

// $dimagen = addslashes(file_get_contents($_FILES['picimagen']['tmp_name']));


$dautor = $_POST['cboautor'];
$dgenero = $_POST['cbogenero'];
$deditorial = $_POST['cboeditorial'];
// $dubicacion = $_POST['txtubicacion'];
 $dejemplar = $_POST['txtejemplar'];
 $dfecha = $_POST['dtpFecha'];


if (!empty($dautor)  && !empty($dgenero) && !empty($deditorial) && !empty($dejemplar) && !empty($dfecha)
	) 
{


	$query = "  
	INSERT INTO libros(
	CodAutor,
	CodGenero,
	CodEditorial,
	Ejemplar,
	fecha_v)
	VALUES(
	'$dautor',
	'$dgenero',
	'$deditorial',
	'$dejemplar',
	'$dfecha')
	";

	$resultado = $cnmysql->query($query);

	if ($resultado) {

		include('Vlibro.php');


		
	}else{
		echo "<h1 style='color:#fff;'>Error al Agregar Producto</h1>";
	}


}else{
	echo "<h1 style='color:#fff;'>Rellene todos los datos porfavor</h1>";
}




?>