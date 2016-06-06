<?php
include_once(__DIR__.'/../DAO/SucursalDAO.php');
include_once('RouteInfo.php');

class SucursalController
{
    public static function getNearestSucursal($lat, $lon, $maxTime = 30*60) // maxTime = 30 minutos * 60 segundos
    {
        $nearestSucursal = null;
        foreach (SucursalDAO::getAll() as $sucursal) {
            $route = new RouteInfo();
            $route->getRouteInfo($lat.",".$lon, $sucursal->getLat().",". $sucursal->getLon());
            if ($route->getResponseStatus() == "OK" && $route->getResultStatus() == "OK") {
                if ($route->getDurationValue() < $maxTime) {
                    if (is_null($nearestSucursal)) {
                        $nearestSucursal = $sucursal;
                        $minDuration = $route->getDurationValue();
                    } else {
                        if ($route->getDurationValue() < $minDuration) {
                            $minDuration = $route->getDurationValue();
                            $nearestSucursal = $sucursal;
                        }
                    }
                }
            } else {
                return null;
            }
        }
        return $nearestSucursal;
    }

    public static function getAllSucursales(){
        return SucursalDAO::getAll();
    }

    public static function getInventarioIngrediente($sucursal, $ingrediente)
    {
        $stm = Conexion::execute("select*from inv_ingrediente where Sucursal_id=? and Ingrediente_id=?", array($sucursal->getId(), $ingrediente->getId()));
        if ($row = $stm->fetch()) {
            return $row['existencias'];
        }
        return 0;
    }

    public static function getInventarioRefresco($sucursal, $refresco)
    {
        $stm = Conexion::execute("select*from inv_refresco where Sucursal_id=? and Refresco_id=?", array($sucursal->getId(), $refresco->getId()));
        if ($row = $stm->fetch()) {
            return $row['cantidad'];
        }
        return 0;
    }

    public static function reducirInventarioIngrediente($sucursal, $ingrediente)
    {
        Conexion::execute("update inv_ingrediente set existencias = existencias-? where Sucursal_id=? and Ingrediente_id=?", array($ingrediente->cantidad, $sucursal->getId(), $ingrediente->getId()));
    }

    public static function reducirInventarioRefresco($sucursal, $refresco)
    {
        Conexion::execute("update inv_refresco set cantidad = cantidad-? where Sucursal_id=? and Refresco_id=?", array($refresco->cantidad, $sucursal->getId(), $refresco->getId()));
    }
}

?>
