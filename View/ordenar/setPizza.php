<?php
$active = "ordenar";
require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");
require_once("../../Controller/OrdenController.php");

if (!empty($_POST)) {

}

$especial = EspecialDAO::get($_GET['id']);
$orillas = OrillaDAO::getAll();

$precio = 50;
foreach ($especial->getPizza()->getIngredientes() as $ingrediente) {
	$precio += $ingrediente->getPrecio();
}

?>
    <!-- <head> content aquí -->
	<style>
	</style>
	<script>
		function getSelectedText(elementId) {
			var elt = document.getElementById(elementId);

			if (elt.selectedIndex == -1)
				return null;

			return elt.options[elt.selectedIndex].text;
		}
		function update() {
			var stam = getSelectedText("size");
			var sorilla = getSelectedText("orilla");
			var tam = stam.substring(stam.indexOf('$') + 1);
			var orilla = sorilla.substring(sorilla.indexOf('$') + 1);
			var cantidad = document.getElementById("cantidad").value;
			var precio = (Number(tam) + Number(orilla)) * cantidad;
			document.getElementById("precio").innerHTML = "$" + precio.toFixed(2);
		}
	</script>
<?php

require_once("../layout/body.php");

?>
    <!-- Contenido va aquí-->
    <h1>Preferencias de la pizza</h1>
	<h3><?= $especial->getNombre() ?></h3>
	<form action='myOrderList' method="post">
		<input type='hidden' name='id' value='001' />
		<p>Tamaño</p>
		<select name='size' id="size" onchange="update()">
			<option value='0'>Chica - $<?= number_format($precio, 2) ?></option>
			<option value='1' selected='selected'>Mediana - $<?= number_format($precio * 1.3, 2) ?></option>
			<option value='2'>Grande - $<?= number_format($precio * 1.5, 2) ?></option>
		</select>
		<p>Orilla</p>
		<select name='orilla' id="orilla" onchange="update()">
			<?php foreach ($orillas as $orilla): ?>
				<option value='<?= $orilla->getId() ?>'><?= $orilla->getNombre() ?> -
					$<?= number_format($orilla->getPrecioExtra(), 2) ?></option>
			<?php endforeach; ?>
		</select>
		<div class='form-group'>
			<input type='number' name='cantidad' id="cantidad" placeholder='cantidad' value="1" min="1"
				   onchange="update()" onkeyup="update()"/>
		</div>
		<p>Total <strong class='text-success' id="precio">$10000000</strong></p>
		<div class='row'>
			<div class='col-6'>
				<a href='choosePizza'><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
			<div class='col-6'>
				<button type='submit' name='addEspecialidad' class='btn-success'>Agregar!</button>
			</div>
		</div>
	</form>
	<script>update()</script>
<?php
	include_once("../layout/footer.php");
?>