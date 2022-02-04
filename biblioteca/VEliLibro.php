<?php

	include('../dbconexion.php');
	$dcodLi = $_POST['vcod'];


	$query= "SELECT * FROM libros wHERE CodLibro = '$dcodLi'";

	$resultado = $cnmysql->query($query);

	$fila = mysqli_fetch_array($resultado);

	$Titulo = $fila['Titulo'];
	$Imagen = "data:image/jpg;base64," .base64_encode($fila['Portada']);
	


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css_l/hoja_EliLector.css">
	<title></title>
</head>
<body>
	<div id="CEliLi">
		
		<div id="CajaMensaje">
			<h1><strong>Mensaje del Sistema</strong></h1>

			<div id="DatosLibro">
				


			</div>
				
				

		

			<p>¿Desea el Eliminar del Registro este Producto?</p>
			<div>
				<button type="button" onclick="DEliminarLi(<?php echo $dcodLi; ?>);">Aceptar</button>
				<button type="button" onclick="VistaLibro();">Cancelar</button>
			</div>
		</div>


	</div>

</body>
</html>
