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
    echo "La sucursal más cercana es: <br>";
    echo $nearestSucursal->toString();
} else {
    echo "No se pudo obtener la sucursal más cercana... <br> pudo tratarse de un error de la base de datos o a Google Maps le dio hueva buscar...";
}


?>

