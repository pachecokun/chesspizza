<?php
include_once('DAO/SucursalesDAO.php');
include_once('RouteInfo.php');

class SucursalController
{
    public static function getNearestSucursal($lat, $lon)
    {
        $nearestSucursal = null;
        foreach (SucursalesDAO::getAll() as $sucursal) {
            $route = new RouteInfo($lat, $lon, $sucursal->getLat(), $sucursal->getLon());
            if($route->getResponseStatus() == "OK" && $route->getResultStatus() == "OK"){
                if(is_null($nearestSucursal)){
                    $nearestSucursal = $sucursal;
                    $minDuration = $route->getDurationValue();
                }else{
                    if($route->getDurationValue() < $minDuration){
                        $minDuration = $route->getDurationValue();
                        $nearestSucursal = $sucursal;
                    }
                }
            }else{
                return null;
            }
        }
        return $nearestSucursal;
    }
}
?>