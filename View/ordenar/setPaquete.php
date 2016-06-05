<?php
require_once("../../Controller/OrdenController.php");
$active = "ordenar";
require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");
require_once("../../Controller/EspecialController.php");

$paquete = PaqueteDAO::get($_GET['id']);
$orillas = OrillaDAO::getAll();

$precio = EspecialController::getPrecio($paquete->getEspecial());

if (isset($_POST['idPaquete'])) {
	OrdenController::addPaquete($_POST['idPaquete'], $_POST['orilla'], $_POST['size'], $_POST['refresco'], $_POST['cantidad']);
}
?>
    <!-- <head> content aquí -->
	<style>
		.container ul{
			list-style-type: none;
		}
		.container ul li{
			font-size: 20px;
		}
	</style>
	<script>
		var base = <?=$paquete->getPrecio()?>;
		function getSelectedText(elementId) {
			var elt = document.getElementById(elementId);

			if (elt.selectedIndex == -1)
				return null;

			return elt.options[elt.selectedIndex].text;
		}
		function update() {
			var stam = getSelectedText("size");
			var sorilla = getSelectedText("orilla");
			var srefresco = getSelectedText("refresco");
			var tam = stam.substring(stam.indexOf('$') + 1);
			var orilla = sorilla.substring(sorilla.indexOf('$') + 1);
			var cantidad = document.getElementById("cantidad").value;
			var refresco = srefresco.substring(srefresco.indexOf('$') + 1);
			var precio = (base + (Number(tam) + Number(orilla) + Number(refresco))) * cantidad;
			document.getElementById("precio").innerHTML = "$" + precio.toFixed(2);
		}
	</script>
<?php
	require_once("../layout/body.php");
if (isset($orden)) {
	print_r($orden);
}
?>
    <!-- Contenido va aquí-->
    <h1>Armar Paquete</h1>
	<h2><?= $paquete->getNombre() ?> - $<?= number_format($paquete->getPrecio(), 2) ?></h2>
	<form method="post">
		<input type='hidden' name='idPaquete' value='<?= $paquete->getId() ?>'>
		<h3>Pizza <?= $paquete->getEspecial()->getNombre() ?></h3>
		<p>Tamaño</p>
		<select name='size' id="size" onchange="update()">
			<option value='0'>Chica - $<?= number_format(0, 2) ?></option>
			<option value='1'>Mediana - $<?= number_format($precio * 0.3, 2) ?></option>
			<option value='2'>Grande - $<?= number_format($precio * 0.5, 2) ?></option>
		</select>
		<p>Orilla</p>
		<select name='orilla' id="orilla" onchange="update()">
			<?php foreach ($orillas as $orilla): ?>
				<option value='<?= $orilla->getId() ?>'><?= $orilla->getNombre() ?> -
					$<?= number_format($orilla->getPrecioExtra(), 2) ?></option>
			<?php endforeach; ?>
		</select>
		<h3>Refresco <?= $paquete->getRefresco()->getNombre() ?></h3>
		<p>Tamaño</p>
		<select name='refresco' id="refresco" onchange="update()">
			<option value='0'>600 ml - $<?= number_format(0, 2) ?></option>
			<option value='1'>1.5 L - $<?= number_format(REFRECO_MEDIANO - REFRECO_CHICO, 2) ?></option>
			<option value='2'>2.5 L - $<?= number_format(REFRECO_GRANDE - REFRECO_CHICO, 2) ?></option>
		</select>
		<h3>Cantidad</h3>
		<div class='form-group'>
			<input type='number' name='cantidad' id="cantidad" placeholder='cantidad' value="1" min="1"
				   onchange="update()" onkeyup="update()"/>
		</div>
		<p>Total <strong class='text-success' id="precio">$1000000</strong></p>
		<div class='row'>
			<div class='col-6'>
				<a href='addPaquete'><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
			<div class='col-6'>
				<button type='submit' name='addPaquete' class='btn-success'>Agregar!</button>
			</div>
		</div>
		<script>update()</script>
	</form>
<?php
	include_once("../layout/footer.php");
?>