<?php
	$pos ="../"; //fix para la ubicación relativa en las rutas.
	$active = "ordenar";
	require_once($pos."../headerCliente.php");
?>
    <!-- <head> content aquí -->
<?php
	require_once($pos."../body.php");
?>
    <!-- Contenido va aquí-->
    <h1>Ordenar Pizza</h1>
	<h3>Dínos a dónde mandarla</h2>
	<p class='text-info'>Permite acceder a tu ubicación desde el navegador.</p>
	<div class='sample'>DIV Ubicación</div>
	<h3>Modifica tu dirección</h3>
	<form method='post'>
		<div class='form-group'>
			Sucursal
			<select disabled='disabled'>
				<option>Torres Lindavista</option>
			</select>
		</div>
		<div class='form-group'>
			<input type='text' placeholder='Calle' />
			<input type='text' placeholder='Número exterior' />
			<input type='text' placeholder='Número interior (Opcional)' />
			<input type='text' placeholder='Colonia' />
			<input type='number' placeholder='Código postal' />
		</div>
		<div class='form-group'>
			Datos de contacto
			<input type='text' placeholder='Nombre' />
			<input type='number' placeholder='Teléfono' />
			<input type='email' placeholder='Correo Electrónico' />
		</div>
		<a href='myOrderList.php'>
			<button type='button'>Aceptar</button>
		</a>
	</form>
	
<?php
	include_once($pos."../footer.php");
?>