<?php
	$active = "ordenar";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
	include_once("../../DAO/SucursalDAO.php");
	include_once("../../Controller/SucursalController.php");
	include_once("../../Controller/Address.php");
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTNw24eYAdlQdFZOQeTZEdDCJmUoClqG4&language=es"
		type="text/javascript"></script>
<script src="/js/ordenar/ordenar.js" type="text/javascript"></script>
    <!-- <head> content aquí -->
<?php
	require_once("../layout/body.php");
?>

<?php
if (isset($_GET["Lat"]) && isset($_GET["Lon"])) {
    $lat = $_GET["Lat"];
    $lon = $_GET["Lon"];
} else {
    header("location:/");
}
$nearestSucursal = SucursalController::getNearestSucursal($lat, $lon);
if (!is_null($nearestSucursal)) {
    $nameSuc = $nearestSucursal->getNombre();
    $address = new Address($lat,$lon);
    $street = $address->getStreet();
    $number = $address->getNumber();
    $neighborhood = $address->getNeighborhood();
    $mun = $address->getMun();
    $zipCode = $address->getZipCode();
} else {
  $_SESSION["message"] = "No se encuentran sucursales cercanas a su ubicación...";
    header("location:/");
}
?>
    <!-- Contenido va aquí-->
    <h1>Ordenar Pizza</h1>
	<h3>Hemos detectado tu ubicación. Verifica tu dirección más abajo</h3>
<div id="mapa" class="sample">
</div>
<script>
	initMap();
	if ($err = suc(<?=$nearestSucursal->getLat()?>,<?=$nearestSucursal->getLon()?>, "<?=$nearestSucursal->getNombre()?>")) {

	}
	home(<?=$lat?>,<?=$lon?>);
	<?php

	?>
</script>
	<h3>Modifica tu dirección</h3>
<form method='post' action="/ordenar/myOrderList">
	<input type="hidden" name="lat" value="<?= $lat ?>"/>
	<input type="hidden" name="lon" value="<?= $lon ?>"/>
		<div class='form-group'>
			Sucursal
			<select disabled='disabled'>
				<option><?php echo $nameSuc?></option>
			</select>
			<input type="hidden" name="suc" value="<?=$nearestSucursal->getId()?>">
		</div>
		<div class='form-group'>
			<input type='text' required placeholder='Calle' name="calle" value="<?php echo $street ?>"/>
			<input type='text' required placeholder='Número exterior' name="ne" value="<?php echo $number ?>"/>
			<input type='text' placeholder='Número interior (Opcional)' name="ni"/>
			<input type='text' required placeholder='Colonia' name="col" value="<?php echo $neighborhood ?>"/>
			<input type='text' required placeholder='Municipio/Delegación' name="mun" value="<?php echo $mun ?>"/>
			<input type='number' required placeholder='Código postal' name="cp" value="<?php echo $zipCode ?>"/>
		</div>
		<div class='form-group'>
			Datos de contacto
			<input type='text' required placeholder='Nombre' name="nom"/>
			<input type='number' required placeholder='Teléfono' name="tel"/>
			<input type='email' required placeholder='Correo Electrónico' name="email"/>
		</div>
	<input type='submit' value="Siguiente paso"/>
	</form>
	
<?php
	include_once("../layout/footer.php");
?>
