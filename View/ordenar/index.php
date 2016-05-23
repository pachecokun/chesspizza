<?php
	$pos ="../"; //fix para la ubicación relativa en las rutas.
	$active = "ordenar";
	require_once($pos."headerCliente.php");
  include_once ($pos. "../DAO/SucursalDAO.php");
  include_once ($pos. "../Controller/SucursalController.php");
include_once ($pos. "../Controller/Address.php");
?>
    <!-- <head> content aquí -->
<?php
	require_once($pos."body.php");
?>

<?php
if (isset($_POST["Lat"]) && isset($_POST["Lon"])) {
    $lat = $_POST["Lat"];
    $lon = $_POST["Lon"];
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
  /*$_SESSION["message"] = "No se encuentran sucursales cercanas a su ubicación...";*/
    header("location:/");
}
?>
    <!-- Contenido va aquí-->
    <h1>Ordenar Pizza</h1>
	<h3>Hemos detectado tu ubicación. Verifica tu dirección más abajo</h3>
	<!--p class='text-info'>Permite acceder a tu ubicación desde el navegador.</p-->
	<div class='sample'>

        Aquí debe de ir un mapa con las coordenadas que tienen las variables $lat y $lon, de latitud y longitud respectivamente

        </div>
	<h3>Modifica tu dirección</h3>
	<form method='post'>
		<div class='form-group'>
			Sucursal
			<select disabled='disabled'>
				<option><?php echo $nameSuc?></option>
			</select>
		</div>
		<div class='form-group'>
			<input type='text' placeholder='Calle' value="<?php echo $street?>"/>
			<input type='text' placeholder='Número exterior' value="<?php echo $number?>" />
			<input type='text' placeholder='Número interior (Opcional)' />
			<input type='text' placeholder='Colonia' value="<?php echo $neighborhood?>" />
            <input type='text' placeholder='Municipio/Delegación' value="<?php echo $mun?>" />
			<input type='number' placeholder='Código postal' value="<?php echo $zipCode?>" />
		</div>
		<div class='form-group'>
			Datos de contacto
			<input type='text' placeholder='Nombre' />
			<input type='number' placeholder='Teléfono' />
			<input type='email' placeholder='Correo Electrónico' />
		</div>
		<a href='myOrderList.php'>
			<button type='button'>Siguiente paso</button>
		</a>
	</form>
	
<?php
	include_once($pos."footer.php");
?>