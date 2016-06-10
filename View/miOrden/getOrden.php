<?php
	$active = "miOrden";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
<?php
	$title = "Consultar orden"; //Solo si no se quiere el título del active
	require_once("../layout/body.php");
?>
	<p>Ingresa tu <span class='text-info'>número de orden</span></p>
	<form action="../miOrden/" method="get">
		<input type='text' name='order' placeholder='Número de orden' required='required'/>
		<input type='email' name='email' placeholder='Correo electrónico' required='required'/>		
		<button type='submit' class='btn-info'>Consultar</button>
	</form>
	<small>Al momento de confirmar tu orden, te mostramos tu número de orden y lo enviamos a tu correo.
	Recuerda revisar tu bandeja de correo no deseado.</small>
<?php
	include_once("../layout/footer.php");
?>