<?php
include_once "DAO/SucursalesDAO.php";
include_once "Controller/SucursalController.php";
if (isset($_POST["Lat"]) && isset($_POST["Lon"])) {
    $lat = $_POST["Lat"];
    $lon = $_POST["Lon"];
} else {
    header("location:index.php");
}
echo "Tu position<br>";
echo "Lat: " . $lat . "<br>";
echo "Long: " . $lon . "<br><br><br>";
$nearestSucursal = SucursalController::getNearestSucursal($lat, $lon);
if (!is_null($nearestSucursal)) {
    echo "Su dirección es: " . (new RouteInfo($lat,$lon,$lat,$lon))->getOriginAddress() . "\n";
    echo "La sucursal más cercana es: <br>";
    echo $nearestSucursal->getNombre() . "\n";
    echo $nearestSucursal->getDireccion();
} else {
    echo "No se encuentran sucursales cercanas...";
}


?>

