<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_DetGenero.css">
	<title></title>
	<meta charset="utf-8">
</head>

<script type="text/javascript">

		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
			data: parametros,
			url: 'listarGenero.php',
			type: 'POST',
			beforeSend: function(){
			$("#listGenero").html("Procesando")
			},
			success: function(datos){
			$("#listGenero").html(datos);
			}
			});


		})

		function tiempoReal(){

			var tabla = $.ajax({

				url:"listarGenero.php",
				datatype:"text",
				async:false,
			}).responseText;

			document.getElementById("listGenero").innerHTML = tabla;
		}

		setInterval(tiempoReal, 1000);
		

</script>


<body>
	<div id="contenidoDetGenero">
		<div id="cajaMayor">
			<h1>Opciones de Clasificación</h1>

			<div id="caja1">
				<fieldset>
					<legend>Lista de Clasificación</legend>
					<div id="listGenero">
						
					</div>
				</fieldset>
			</div>

			<div id="caja2">

				<div id="agregarGenero">

					<form id="FormAgregarGenero">
						<input type="text" id="txtGenero" placeholder="Nueva Clasificación" required>
						<button type="button" onclick=" GuardarGenero();">Agregar Clasificación</button>
					</form>

				</div>


				<hr>


				<div id="modificarGenero">

					<form id="FormModificarGenero">
						
							<input type="text" id="txtcodGeneroMod" placeholder="Codigo de Clasificación" required>
							<input type="text" id="txtGeneroMod" placeholder="Cambiar Clasificación por..." required>
						
						<button type="button" onclick="ModificarGenero();">Modificar Clasificación</button>
					</form>

				</div>

				
				<hr>


				<div id="EliminarGenero">
					<form id="FormEliminarGenero">
						<input type="text" id="txtcodGeneroEli" placeholder="Ingrese Codigo de Clasificación" required>
						<button type="button" onclick="EliminarGenero();" >Eliminar Clasificación</button>
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