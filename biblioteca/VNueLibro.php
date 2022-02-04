<?php
$fecha = date('Y-m-d');

$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
// $nuevafechaYear = strtotime ( '+1 year' , strtotime ( $fecha ) ) ;

$FechaActual = date ( 'Y-m-d' , $nuevafecha );
// $FechaMaxima = date ( 'Y-m-d' , $nuevafechaYear );

include('../dbconexion.php');

$tablaautor = $cnmysql->query("SELECT * FROM autor");

$tablagenero = $cnmysql->query("SELECT * FROM genero");

$tablaeditorial = $cnmysql->query("SELECT * FROM editorial");

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_NueLibro.css">
	<meta charset="utf-8">
	<title></title>
</head>
<script>


$("#FormNuevoLibro").on("submit", function(e){
	e.preventDefault();

	var formData = new FormData(document.getElementById("FormNuevoLibro"));

	$.ajax({
		url: "DNueLibro.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(datos){
		$("#ContenidoLi").html(datos);
	});
});


</script>
<body>


	<div id="CModLi">
		
		<div id="formulario">
			<h1>Agregar Producto</h1>


			<form enctype="multipart/form-data" id="FormNuevoLibro" method="POST">
			
				<!-- <div>
				<label for="txttitulo">Titulo:</label>
				<input type="text" required id="txttitulo" name="txttitulo">
				</div> -->


				<!-- <div>
					<label for="picimagen">Portada:</label>
					<input type="file" required id="picimagen" type="image/*" name="picimagen">
				</div> -->


				<div>
				<label for="cboautor">Medicamento:</label>
				<select id="cboautor" name="cboautor">
					<?php
					
					while ($fila = mysqli_fetch_array($tablaautor)) {

						echo "<option value='" .$fila['CodAutor'] ."'>" .$fila['Descripcion'] ."</option>";			
					}
					?>

				</select>
				</div>



				<div>
				<label for="cbogenero">Laboratorio:</label>
				<select id="cbogenero" name="cbogenero">
					<?php
					
					while ($fila = mysqli_fetch_array($tablagenero)) {

						echo "<option value='" .$fila['CodGenero'] ."'>" .$fila['Descripcion'] ."</option>";			
					}
					?>
				</select>	
				</div>



				<div>
				<label for="cboeditorial">Clasificación:</label>
				<select id="cboeditorial" name="cboeditorial">
					<?php
					
					while ($fila = mysqli_fetch_array($tablaeditorial)) {

						echo "<option value='" .$fila['CodEditorial'] ."'>" .$fila['Descripcion'] ."</option>";			
					}
					?>
				</select>	
				</div>



				<!-- <div>
				<label for="txtubicacion">Ubicacion:</label>
				<input type="text" required id="txtubicacion" name="txtubicacion" >	
				</div> -->
				<div>
					<label for="dtpFecha">Fecha Vencimiento:</label>
					<input type="date" required id="dtpFecha" step="1" name="dtpFecha" value="<?php echo $FechaActual; ?>">
					
				</div>

				<div>
				<label for="txtejemplar">Cantidad:</label>
				<input type="number" required id="txtejemplar" value="" name="txtejemplar" min="1">
				
				</div>	
				  
				
				<!-- <div>
					<label for="dtpFecha">Fecha Vencimiento:</label>
					<input type="date" required id="dtpFecha" step="1" name="dtpFecha" value="<?php echo $FechaActual; ?>">
					
				</div> -->

				<div id= 'botones'>
					<button type="submit">Guardar</button>
					<button type="button" onclick="VistaLibro();">Cancelar</button>
				</div>
			</form>
		</div>	

	</div>
		
		
			



</body>
</html>