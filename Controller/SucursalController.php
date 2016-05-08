<?php
include_once('DAO/SucursalDAO.php');
include_once('RouteInfo.php');

class SucursalController
{
    public static function getNearestSucursal($lat, $lon, $maxTime = 1800) // maxTime medido en segundos
    {
        $nearestSucursal = null;
        foreach (SucursalDAO::getAll() as $sucursal) {
            $route = new RouteInfo($lat, $lon, $sucursal->getLat(), $sucursal->getLon());
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
}

?>
