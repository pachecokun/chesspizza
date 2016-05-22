<?php
include_once "DAO/SucursalDAO.php";
include_once "Controller/SucursalController.php";
if (isset($_POST["Lat"]) && isset($_POST["Lon"])) {
    $lat = $_POST["Lat"];
    $lon = $_POST["Lon"];
} else {
    header("location:index.php");
}
$nearestSucursal = SucursalController::getNearestSucursal($lat, $lon);
if (!is_null($nearestSucursal)) {
    echo "Su dirección es: " . RouteInfo::getFullAddress($lat,$lon) . "<br>";
    echo "La sucursal más cercana es: <br>";
    echo $nearestSucursal->getNombre() . "<br>";
    echo $nearestSucursal->getDireccion();
} else {
    echo "No se encuentran sucursales cercanas...";
}
?>

