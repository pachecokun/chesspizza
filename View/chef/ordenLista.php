<?php
include_once(__DIR__ . "/../../DAO/OrdenDAO.php");
include_once(__DIR__ . "/../../DAO/SucursalDAO.php");
include_once(__DIR__ . "/../../DAO/StatusDAO.php");
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 6/7/2016
 * Time: 11:38 AM
 */
session_start();
$idSucursal = $_SESSION['empleado']['sucursal'];
$idOrden = $_POST["idOrden"];
$orden = OrdenDAO::get($idOrden);
$sucursal = SucursalDAO::get($idSucursal);
$orden->addOperacion(new Operacion(null, null, null, $sucursal->getLat(), $sucursal->getLon(), StatusDAO::get(STATUS_LISTA)));
OrdenDAO::update($orden);
header("location:/chef/");
?>