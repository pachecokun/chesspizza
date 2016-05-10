<?php
	$pos =""; //fix para la ubicación relativa en las rutas.
	$active = "menu";
	require_once($pos."../headerCliente.php");
?>
	<!-- Head content aquí -->
<?php
	require_once($pos."../bodyCliente.php");
?>
	<!-- Contenido va aquí-->
	<h1>Título 1</h1>
	<h2>Título 2</h2>
	<h3>Título 3</h2>
	<p>Lorem ipsum dolor y la chingada.</p>
	<p><strong>Pizza Pizza</strong></p>
	<form>
		<input type="text" placeholder="Texto" />
		<input type="password" placeholder="Contraseña" />
		<textarea placeholder="Textarea"></textarea>
		<select>
			<option value="lal">Opción 1</option>
			<option value="lal">Opción 2</option>
			<option value="lal">Opción 3</option>
			<option value="lal">Opción 4</option>
		</select>
		<h3>Sexo</h3>
		<input type="radio" name = "sexo" value="H"/> Hombre
		<input type="radio" name = "sexo" value="M"/> Mujer
		<button type="button">Aceptar</button>
	</form>
<?php
	include_once($pos."../footer.php");
?>