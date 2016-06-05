<?php
require_once "../../Controller/OrdenController.php";
$i = $_GET['i'];
$orden = OrdenController::getOrdenSesion();
if (isset($_GET['especial'])) {
    $arr = $orden->getEspeciales();
    unset($arr[$i]);
    $orden->setEspeciales($arr);
} elseif (isset($_GET['pizza'])) {
    $arr = $orden->getPizzas();
    unset($arr[$i]);
    $orden->setPizzas($arr);
} elseif (isset($_GET['paquete'])) {
    $arr = $orden->getPaquetes();
    unset($arr[$i]);
    $orden->setPaquetes($arr);
} elseif (isset($_GET['refresco'])) {
    $arr = $orden->getRefrescos();
    unset($arr[$i]);
    $orden->setRefrescos($arr);
}
OrdenController::setOrdenSesion($orden);
header('Location: /ordenar/myOrderList');