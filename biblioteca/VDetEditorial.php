<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_DetEditorial.css">
	<title></title>
	<meta charset="utf-8">
</head>

<script type="text/javascript">

		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
			data: parametros,
			url: 'listarEditorial.php',
			type: 'POST',
			beforeSend: function(){
			$("#listEditoriales").html("Procesando")
			},
			success: function(datos){
			$("#listEditoriales").html(datos);
			}
			});


		})

		function tiempoReal(){

			var tabla = $.ajax({

				url:"listarEditorial.php",
				datatype:"text",
				async:false,
			}).responseText;

			document.getElementById("listEditoriales").innerHTML = tabla;
		}

		setInterval(tiempoReal, 1000);
		

</script>


<body>
	<div id="contenidoDetEditorial">
		<div id="cajaMayor">
			<h1>Opciones de Laboratorio</h1>

			<div id="caja1">
				<fieldset>
					<legend>Lista de Laboratorios</legend>
					<div id="listEditoriales">
						
					</div>
				</fieldset>
			</div>

			<div id="caja2">

				<div id="agregarEditorial">

					<form id="FormAgregarEditorial">
						<input type="text" id="txtEditorial" placeholder="Nuevo Laboratorio" required>
						<button type="button" onclick="GuardarEditorial();">Agregar Laboratorio</button>
					</form>

				</div>


				<hr>


				<div id="modificarEditorial">

					<form id="FormModificarEditorial">
						
							<input type="text" id="txtcodEditorialMod" placeholder="Codigo de Laboratorio" required>
							<input type="text" id="txtEditorialMod" placeholder="Cambiar Laboratorio por..." required>
						
							<button type="button" onclick="ModificarEditorial();">Modificar Laboratorio</button>
					</form>

				</div>

				
				<hr>


				<div id="EliminarEditorial">
					<form id="FormEliminarEditorial">
						<input type="text" id="txtcodEditorialEli" placeholder="Ingrese Codigo de Laboratorio" required>
						<button type="button" onclick="EliminarEditorial();" >Eliminar Laboratorio</button>
					</form>
				</div>

			</div>

			<div id="CajaMensaje">

			</div>
			
			<div id="Regreso">
				<button onclick="VistaLibro();"> Volver </button>
			</div>

		</div>
	</div>

</body>
</html>